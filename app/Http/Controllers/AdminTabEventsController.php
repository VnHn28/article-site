<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminTabEventsController extends CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "event_module";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "tab_events";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Cover Image 圖片","name"=>"cover_image","image"=>true];
			$this->col[] = ["label"=>"Title 標題","name"=>"title"];
			$this->col[] = ["label"=>"Organization Name 主辦單位","name"=>"organization_name"];
			$this->col[] = ["label"=>"Reservation Begin 報名開始時間","name"=>"reservation_begin"];
			$this->col[] = ["label"=>"Reservation End 報名結束時間","name"=>"reservation_end"];
			$this->col[] = ["label"=>"排序","name"=>"priority"];
			$this->col[] = ["label"=>"上架","name"=>"enable"];
			$this->col[] = ["label"=>"審閱","name"=>"reviewed","callback_php"=>'($row->reviewed==1)?已審閱:未審'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cover Image 圖片','name'=>'cover_image','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Title 標題','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Organization Name 主辦單位','name'=>'organization_name','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Subtitle 列表頁的簡介','name'=>'subtitle','type'=>'ckeditor','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Reservation Begin 報名開始時間','name'=>'reservation_begin','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Reservation End 報名截止時間','name'=>'reservation_end','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Reservation Url 報名網址','name'=>'reservation_url','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Related Url 相關網址','name'=>'related_url','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Contact Name 聯絡人名稱','name'=>'contact_name','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Contact Email 聯絡信箱','name'=>'contact_email','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Location 活動地址','name'=>'location','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Location Description活動地點名稱','name'=>'location_description','type'=>'ckeditor','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Event Begin Time 活動開始時間','name'=>'event_begin_time','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Event End Time 活動結束時間','name'=>'event_end_time','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Content 活動說明','name'=>'content','type'=>'ckeditor','validation'=>'string|min:5|max:30000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fb Url','name'=>'fb_url','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Published At 發佈日期','name'=>'published_date','type'=>'datetime','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'排序','name'=>'priority','type'=>'number','validation'=>'required|integer','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'上架','name'=>'enable','type'=>'number','validation'=>'integer','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'審閱','name'=>'reviewed','type'=>'select','width'=>'col-sm-9','dataenum'=>'0;1'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Id','name'=>'id','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Cover Image 圖片','name'=>'cover_image','type'=>'upload','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Title 標題','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Organization Name 主辦單位','name'=>'organization_name','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Subtitle 列表頁的簡介','name'=>'subtitle','type'=>'ckeditor','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Reservation Begin 報名開始時間','name'=>'reservation_begin','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Reservation End 報名截止時間','name'=>'reservation_end','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Reservation Url 報名網址','name'=>'reservation_url','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Related Url 相關網址','name'=>'related_url','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Contact Name 聯絡人名稱','name'=>'contact_name','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Contact Email 聯絡信箱','name'=>'contact_email','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Location 活動地址','name'=>'location','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Location Description活動地點名稱','name'=>'location_description','type'=>'ckeditor','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Event Begin Time 活動開始時間','name'=>'event_begin_time','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Event End Time 活動結束時間','name'=>'event_end_time','type'=>'datetime','validation'=>'date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Content 活動說明','name'=>'content','type'=>'ckeditor','validation'=>'string|min:5|max:30000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fb Url','name'=>'fb_url','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Created At 創建日期','name'=>'created_at','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'排序','name'=>'priority','type'=>'number','validation'=>'integer','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'上架','name'=>'enable','type'=>'number','validation'=>'integer','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'審閱','name'=>'reviewed','type'=>'select','width'=>'col-sm-9','dataenum'=>'0;1'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();
			$this->addaction[] = ['label'=>'','url'=>env('APP_URL')."/events/[id]",'icon'=>'fa fa-eye','color'=>'primary'];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = "
			//點擊預覽按鈕另開新視窗
			$(function () {
				$('.btn.btn-xs.btn-primary').attr('target', '_blank')
			})";


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}