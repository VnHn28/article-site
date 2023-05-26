<?php namespace app\Http\Controllers;

error_reporting(E_ALL ^ E_NOTICE);

use crocodicstudio\crudbooster\controllers\CBController as BasicCBController;
use crocodicstudio\crudbooster\controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\PDF;
use Maatwebsite\Excel\Facades\Excel;
use CRUDBooster;
use CB;
use Schema;

class CBController extends BasicCBController {

	public function customed_input_assignment($id=null) {			

		$hide_form = (Request::get('hide_form'))?unserialize(Request::get('hide_form')):array();	

		foreach($this->data_inputan as $ro) {
			$name = $ro['name'];

			if(!$name) continue;

			if($ro['exception']) continue;

			if($name=='hide_form') continue;

			if(count($hide_form)) {
				if(in_array($name, $hide_form)) {
					continue;
				}
			}

			if($ro['type']=='checkbox' && $ro['relationship_table']) {
				continue;
			}

			if($ro['type']=='select2' && $ro['relationship_table']) {
				continue; 
			}

			$inputdata = Request::get($name);

			if($ro['type']=='money') {
				$inputdata = preg_replace('/[^\d-]+/', '', $inputdata);
			}

			if($ro['type']=='child') continue;

			if($name) {
				if($inputdata!='') {
					$this->arr[$name] = $inputdata;
				}else{
					if(CB::isColumnNULL($this->table,$name) && $ro['type']!='upload') {
						continue;
					}else{						
						$this->arr[$name] = "";
					}
				}
			}

			$password_candidate = explode(',',config('crudbooster.PASSWORD_FIELDS_CANDIDATE'));
			if(in_array($name, $password_candidate)) {
				if(!empty($this->arr[$name])) {
					$this->arr[$name] = Hash::make($this->arr[$name]);
				}else{
					unset($this->arr[$name]);
				}
			}

			if($ro['type']=='checkbox') {

				if(is_array($inputdata)) {
					if($ro['datatable'] != '') {						
						$table_checkbox = explode(',',$ro['datatable'])[0];
						$field_checkbox = explode(',',$ro['datatable'])[1];
						$table_checkbox_pk = CB::pk($table_checkbox);
						$data_checkbox = DB::table($table_checkbox)->whereIn($table_checkbox_pk,$inputdata)->pluck($field_checkbox)->toArray();
						$this->arr[$name] = implode(";",$data_checkbox);	
					}else{						
						$this->arr[$name] = implode(";",$inputdata);	
					}					
				}
			}

			//multitext colomn 
			if($ro['type']=='multitext') {
				$name = $ro['name'];
				$multitext="";

				for($i=0;$i<=count($this->arr[$name])-1;$i++) {
					$multitext .= $this->arr[$name][$i]."|";
				}	
				$multitext=substr($multitext,0,strlen($multitext)-1);
				$this->arr[$name]=$multitext;
			}
			
			if($ro['type']=='googlemaps') {
				if($ro['latitude'] && $ro['longitude']) {
					$latitude_name = $ro['latitude'];
					$longitude_name = $ro['longitude'];
					$this->arr[$latitude_name] = Request::get('input-latitude-'.$name);
					$this->arr[$longitude_name] = Request::get('input-longitude-'.$name);
				}
			}

			if($ro['type']=='select' || $ro['type']=='select2') {
				if($ro['datatable']) {
					if($inputdata=='') {
						$this->arr[$name] = 0;
					}
				}				
			}


			if(@$ro['type']=='upload') {				
				if (Request::hasFile($name))
				{
					$file = Request::file($name);
					$ext  = $file->getClientOriginalExtension();
					$tempfilename = str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)); //沒用到
					if(!isset($random_number)){
						$random_number = rand(10000, 99999);
					}
					$filename = time().'_'.$random_number;
					$random_number += 1;

					//Create Directory Monthly
					Storage::makeDirectory(date('Y-m'));

					//Move file to storage								
					$file_path = storage_path('app'.DIRECTORY_SEPARATOR.date('Y-m'));

					if($ro['upload_encrypt']==true) {
						$filename = md5(str_random(5)).'.'.$ext;
					}else{
						if(count(glob($file_path.'/'.$filename))>0)
						{
							$filename = $filename.'_'.count(glob($file_path."/$filename*.$ext")).'.'.$ext;					     
						}else{
							$filename = $filename.'.'.$ext;
						}
					}
										
					if($file->move($file_path,$filename)) {
						$this->arr[$name] = 'uploads/'.date('Y-m').'/'.$filename;
					}
				}

				if(!$this->arr[$name]) {
					$this->arr[$name] = Request::get('_'.$name);
				}
			}

			if(@$ro['type']=='filemanager') {
				$url = str_replace(asset('/'),'',$this->arr[$name]);
				$url = str_replace("//","/",$url);
				$this->arr[$name] = $url;
			}
		}		
	}

	public function getAdd(){
		$this->cbLoader();
		if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {
			CRUDBooster::insertLog(trans('crudbooster.log_try_add',['module'=>CRUDBooster::getCurrentModule()->name ]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		}

		$page_title      = trans("crudbooster.add_data_page_title",['module'=>CRUDBooster::getCurrentModule()->name]);
		$page_menu       = Route::getCurrentRoute()->getActionName();
		$command 		 = 'add';

		return view('crudbooster::default.form',compact('page_title','page_menu','command'));
	}

	public function postAddSave() {
		$this->cbLoader();
		if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE) {
			CRUDBooster::insertLog(trans('crudbooster.log_try_add_save',['name'=>Request::input($this->title_field),'module'=>CRUDBooster::getCurrentModule()->name ]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		}

		$this->validation();
		$this->customed_input_assignment();		

		if(Schema::hasColumn($this->table, 'created_at'))
		{
		    $this->arr['created_at'] = date('Y-m-d H:i:s');
		}

		$this->hook_before_add($this->arr);


		$this->arr[$this->primary_key] = $id = CRUDBooster::newId($this->table);		
		DB::table($this->table)->insert($this->arr);		


		//Looping Data Input Again After Insert
		foreach($this->data_inputan as $ro) {
			$name = $ro['name'];
			if(!$name) continue;

			$inputdata = Request::get($name);

			//Insert Data Checkbox if Type Datatable
			if($ro['type'] == 'checkbox') {
				if($ro['relationship_table']) {
					$datatable = explode(",",$ro['datatable'])[0];
					$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
					$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
					DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

					if($inputdata) {
						$relationship_table_pk = CB::pk($ro['relationship_table']);
						foreach($inputdata as $input_id) {
							DB::table($ro['relationship_table'])->insert([
								$relationship_table_pk=>CRUDBooster::newId($ro['relationship_table']),
								$foreignKey=>$id,
								$foreignKey2=>$input_id
								]);
						}
					}

				}
			}


			if($ro['type'] == 'select2') {
				if($ro['relationship_table']) {
					$datatable = explode(",",$ro['datatable'])[0];
					$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
					$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
					DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

					if($inputdata) {
						foreach($inputdata as $input_id) {
							$relationship_table_pk = CB::pk($row['relationship_table']);
							DB::table($ro['relationship_table'])->insert([
								$relationship_table_pk=>CRUDBooster::newId($ro['relationship_table']),
								$foreignKey=>$id,
								$foreignKey2=>$input_id
								]);
						}
					}

				}
			}

			if($ro['type']=='child') {
				$name = str_slug($ro['label'],'');
				$columns = $ro['columns'];				
				$count_input_data = count(Request::get($name.'-'.$columns[0]['name']))-1;
				$child_array = [];

				for($i=0;$i<=$count_input_data;$i++) {
					$fk = $ro['foreign_key'];
					$column_data = [];
					$column_data[$fk] = $id;
					foreach($columns as $col) {
						$colname = $col['name'];
						$column_data[$colname] = Request::get($name.'-'.$colname)[$i];
					}
					$child_array[] = $column_data;
				}	

				$childtable = CRUDBooster::parseSqlTable($ro['table'])['table'];
				DB::table($childtable)->insert($child_array);
			}


			
		}


		$this->hook_after_add($this->arr[$this->primary_key]);


		$this->return_url = ($this->return_url)?$this->return_url:Request::get('return_url');

		//insert log
		CRUDBooster::insertLog(trans("crudbooster.log_add",['name'=>$this->arr[$this->title_field],'module'=>CRUDBooster::getCurrentModule()->name]));

		if($this->return_url) {
			if(Request::get('submit') == trans('crudbooster.button_save_more')) {
				CRUDBooster::redirect(Request::server('HTTP_REFERER'),trans("crudbooster.alert_add_data_success"),'success');
			}else{
				CRUDBooster::redirect($this->return_url,trans("crudbooster.alert_add_data_success"),'success');
			}

		}else{
			if(Request::get('submit') == trans('crudbooster.button_save_more')) {
				CRUDBooster::redirect(CRUDBooster::mainpath('add'),trans("crudbooster.alert_add_data_success"),'success');
			}else{
				CRUDBooster::redirect(CRUDBooster::mainpath(),trans("crudbooster.alert_add_data_success"),'success');
			}
		}
	}

	public function getEdit($id){
		$this->cbLoader();
		$row             = DB::table($this->table)->where($this->primary_key,$id)->first();

		if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {
			CRUDBooster::insertLog(trans("crudbooster.log_try_edit",['name'=>$row->{$this->title_field},'module'=>CRUDBooster::getCurrentModule()->name]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		}


		$page_menu       = Route::getCurrentRoute()->getActionName();
		$page_title 	 = trans("crudbooster.edit_data_page_title",['module'=>CRUDBooster::getCurrentModule()->name,'name'=>$row->{$this->title_field}]);
		$command 		 = 'edit';
		Session::put('current_row_id',$id);
		return view('crudbooster::default.form',compact('id','row','page_menu','page_title','command'));
	}

	public function postEditSave($id) {
		$this->cbLoader();
		$row = DB::table($this->table)->where($this->primary_key,$id)->first();

		if(!CRUDBooster::isUpdate() && $this->global_privilege==FALSE) {
			CRUDBooster::insertLog(trans("crudbooster.log_try_add",['name'=>$row->{$this->title_field},'module'=>CRUDBooster::getCurrentModule()->name]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		}

		$this->validation($id);
		$this->customed_input_assignment($id);				

		if (Schema::hasColumn($this->table, 'updated_at'))
		{
		    $this->arr['updated_at'] = date('Y-m-d H:i:s');
		}
		

		$this->hook_before_edit($this->arr,$id);		
		DB::table($this->table)->where($this->primary_key,$id)->update($this->arr);		

		//Looping Data Input Again After Insert
		foreach($this->data_inputan as $ro) {
			$name = $ro['name'];
			if(!$name) continue;

			$inputdata = Request::get($name);

			//Insert Data Checkbox if Type Datatable
			if($ro['type'] == 'checkbox') {
				if($ro['relationship_table']) {
					$datatable = explode(",",$ro['datatable'])[0];					
					
					$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
					$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
					DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

					if($inputdata) {
						foreach($inputdata as $input_id) {
							$relationship_table_pk = CB::pk($ro['relationship_table']);
							DB::table($ro['relationship_table'])->insert([
								$relationship_table_pk=>CRUDBooster::newId($ro['relationship_table']),
								$foreignKey=>$id,
								$foreignKey2=>$input_id
								]);
						}
					}
					

				}
			}


			if($ro['type'] == 'select2') {
				if($ro['relationship_table']) {
					$datatable = explode(",",$ro['datatable'])[0];					
					
					$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
					$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
					DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

					if($inputdata) {
						foreach($inputdata as $input_id) {
							$relationship_table_pk = CB::pk($ro['relationship_table']);
							DB::table($ro['relationship_table'])->insert([
								$relationship_table_pk=>CRUDBooster::newId($ro['relationship_table']),
								$foreignKey=>$id,
								$foreignKey2=>$input_id
								]);
						}
					}
					

				}
			}

			if($ro['type']=='child') {
				$name = str_slug($ro['label'],'');
				$columns = $ro['columns'];				
				$count_input_data = count(Request::get($name.'-'.$columns[0]['name']))-1;
				$child_array = [];
				$childtable = CRUDBooster::parseSqlTable($ro['table'])['table'];
				$fk = $ro['foreign_key'];

				DB::table($childtable)->where($fk,$id)->delete();
				$lastId = CRUDBooster::newId($childtable);
				$childtablePK = CB::pk($childtable);

				for($i=0;$i<=$count_input_data;$i++) {
					
					$column_data = [];
					$column_data[$childtablePK] = $lastId;
					$column_data[$fk] = $id;
					foreach($columns as $col) {
						$colname = $col['name'];
						$column_data[$colname] = Request::get($name.'-'.$colname)[$i];
					}
					$child_array[] = $column_data;

					$lastId++;
				}	

				$child_array = array_reverse($child_array);
				
				DB::table($childtable)->insert($child_array);
			}


		}

		$this->hook_after_edit($id);


		$this->return_url = ($this->return_url)?$this->return_url:Request::get('return_url');

		//insert log
		CRUDBooster::insertLog(trans("crudbooster.log_update",['name'=>$this->arr[$this->title_field],'module'=>CRUDBooster::getCurrentModule()->name]));

		if($this->return_url) {
			CRUDBooster::redirect($this->return_url,trans("crudbooster.alert_update_data_success"),'success');
		}else{
			if(Request::get('submit') == trans('crudbooster.button_save_more')) {
				CRUDBooster::redirect(CRUDBooster::mainpath('add'),trans("crudbooster.alert_update_data_success"),'success');
			}else{
				CRUDBooster::redirect(CRUDBooster::mainpath(),trans("crudbooster.alert_update_data_success"),'success');
			}
		}
	}


}
