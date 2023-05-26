<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminTabGroupsController extends CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "groups_module";
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
			$this->table = "tab_groups";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"文章ID","name"=>"id"];
			$this->col[] = ["label"=>"文章標題","name"=>"title"];
			$this->col[] = ["label"=>"團體類別","name"=>"category_id","join"=>"tab_group_categorys,name"];
			$this->col[] = ["label"=>"團體文章分類","name"=>"group_article_categories_id","join"=>"tab_group_article_categories,name"];
			$this->col[] = ["label"=>"主圖","name"=>"cover_image","image"=>true];
			$this->col[] = ["label"=>"Members","name"=>"author_id","join"=>"tab_authors,name"];
			$this->col[] = ["label"=>"排序權重","name"=>"priority"];
			$this->col[] = ["label"=>"審查","name"=>"reviewed"];
			$this->col[] = ["label"=>"上下架","name"=>"enable"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'文章標題','name'=>'title','type'=>'text','validation'=>'required|string|min:3','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'團體類別','name'=>'category_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataquery'=>'SELECT `id` as `value`, CONCAT(`id`, " - ",`name`) as `label`  FROM tab_group_categorys ORDER BY id'];
			$this->form[] = ['label'=>'團體_文章分類','name'=>'group_article_categories_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataquery'=>'SELECT `id` as `value`, CONCAT(`id`, " - ",`name`) as `label`  FROM tab_group_article_categories ORDER BY id'];
			$this->form[] = ['label'=>'主圖','name'=>'cover_image','type'=>'upload','validation'=>'required|min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'列表頁簡介','name'=>'subtitle','type'=>'textarea','validation'=>'required|string','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'內文','name'=>'content','type'=>'wysiwyg','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Members','name'=>'author_id','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataquery'=>'SELECT `id` as `value`, CONCAT(`id`, " - ",`name`) as `label`  FROM tab_authors ORDER BY id'];
			$this->form[] = ['label' => '精選花絮是否顯示', 'name' => 'display_gallery', 'type' => 'radio', 'validation' => 'required', 'width' => 'col-sm-10', 'dataenum' => '0|不顯示;1|顯示'];
			$this->form[] = ['label'=>'精選花絮1','name'=>'gallery_img1','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮1排序權重','name'=>'priority_img1','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮2','name'=>'gallery_img2','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮2排序權重','name'=>'priority_img2','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮3','name'=>'gallery_img3','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮3排序權重','name'=>'priority_img3','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮4','name'=>'gallery_img4','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮4排序權重','name'=>'priority_img4','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮5','name'=>'gallery_img5','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮5排序權重','name'=>'priority_img5','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮6','name'=>'gallery_img6','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮6排序權重','name'=>'priority_img6','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮7','name'=>'gallery_img7','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮7排序權重','name'=>'priority_img7','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮8','name'=>'gallery_img8','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮8排序權重','name'=>'priority_img8','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮9','name'=>'gallery_img9','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮9排序權重','name'=>'priority_img9','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮10','name'=>'gallery_img10','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮10排序權重','name'=>'priority_img10','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮11','name'=>'gallery_img11','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮11排序權重','name'=>'priority_img11','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'精選花絮12','name'=>'gallery_img12','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'花絮12排序權重','name'=>'priority_img12','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Published At 發佈日期','name'=>'published_date','type'=>'datetime','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'排序權重','name'=>'priority','type'=>'number','required|validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'審查','name'=>'reviewed','type'=>'radio','validation'=>'required|min:0|max:1','width'=>'col-sm-10','dataenum'=>'0|未審查;1|已審查'];
			$this->form[] = ['label'=>'上下架','name'=>'enable','type'=>'radio','validation'=>'required|min:0|max:1','width'=>'col-sm-10','dataenum'=>'0|下架;1|上架'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'文章ID','name'=>'id','type'=>'text','validation'=>'integer|min:0','width'=>'col-sm-10','readonly'=>'1'];
			//$this->form[] = ['label'=>'文章標題','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'團體類別','name'=>'category_id','type'=>'select','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'團體文章分類','name'=>'group_article_categories_id','type'=>'select','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'主圖','name'=>'cover_image','type'=>'upload','validation'=>'required|min:1|max:2048','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'列表頁簡介','name'=>'subtitle','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'內文','name'=>'content','type'=>'ckeditor','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'MEMBERS_ID','name'=>'author_id','type'=>'select','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'發佈日期','name'=>'created_at','type'=>'datetime','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'排序權重','name'=>'priority','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'審查','name'=>'reviewed','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'tab_group_article_categories,id'];
			//$this->form[] = ['label'=>'上下架','name'=>'enable','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
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
			$this->addaction[] = ['label'=>'','url'=>env('APP_URL')."/group/[id]",'icon'=>'fa fa-eye','color'=>'primary'];


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
				})
				$('input[name=\"submit\"]').click(function(event) {
					// Check if a file has been uploaded
					if ($('input[name=\"display_gallery\"]:checked').val() === '1') {
						var no_file = 0;
						var gal_img = 0;
						$('input[id^=\"gallery_img\"]').each(function() {
							if(this.files.length > 0) {
								no_file+=1;
							}
							gal_img+=1;
						});
						if (no_file==0 && gal_img==12) {
							event.preventDefault(); // Prevent the form from submitting
							alert(\"請至少上傳一張精選花絮照片，或者「精選花絮是否顯示」請選擇「不顯示」。\");
							return
						}
					} 
				});
			";


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