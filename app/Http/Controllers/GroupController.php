<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class GroupController extends Controller
{
    public function index(){
		return redirect('/groups');
    }

    public function show($id){
		$checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
			$group = \App\tab_groups::select(['tab_groups.*', 'tab_authors.name as member_name', 'tab_authors.cover_image AS author_cover_image'])
							->join('tab_authors', 'tab_authors.id', '=', 'tab_groups.author_id')
							->where('tab_groups.id', '=', $id)
    						->first();
		} else {
			$group = \App\tab_groups::select(['tab_groups.*', 'tab_authors.name as member_name', 'tab_authors.cover_image AS author_cover_image'])
							->join('tab_authors', 'tab_authors.id', '=', 'tab_groups.author_id')
							->where('tab_groups.id', '=', $id)
                            ->where('tab_groups.enable', '=', 1)
							->where('tab_groups.reviewed', '=', 1)
    						->first();
		}
    	
        if($group == false){
            return redirect('/groups', 302)->with('alert', '查無此文章');
        }

		//花絮照片排序SOL
		$tab_data_gallery = \App\tab_groups::select(['tab_groups.gallery_img1', 'tab_groups.priority_img1','tab_groups.gallery_img2', 'tab_groups.priority_img2','tab_groups.gallery_img3', 'tab_groups.priority_img3','tab_groups.gallery_img4', 'tab_groups.priority_img4','tab_groups.gallery_img5', 'tab_groups.priority_img5','tab_groups.gallery_img6', 'tab_groups.priority_img6','tab_groups.gallery_img7', 'tab_groups.priority_img7','tab_groups.gallery_img8', 'tab_groups.priority_img8','tab_groups.gallery_img9', 'tab_groups.priority_img9','tab_groups.gallery_img10','tab_groups.priority_img10', 'tab_groups.gallery_img11','tab_groups.priority_img11', 'tab_groups.gallery_img12','tab_groups.priority_img12'])
										->where('tab_groups.id', '=', $id)
										->where('tab_groups.display_gallery', '=', 1)
										->where('tab_groups.enable', '=', 1)
										->where('tab_groups.reviewed', '=', 1)
										->first();

		if($tab_data_gallery){
			$tab_data_gallery=$tab_data_gallery->toArray();

			$array_counter=0;
			foreach($tab_data_gallery as $key_tab_data_gallery => $val_tab_data_gallery){

				if(str_contains($key_tab_data_gallery, 'gallery_img')) {
					$array_gallery[$array_counter]['index'] = $array_counter+1;	
					$array_gallery[$array_counter]['gallery_img'] = $val_tab_data_gallery;	
				} if(str_contains($key_tab_data_gallery, 'priority_img')){
					$array_gallery[$array_counter]['priority_img'] = $val_tab_data_gallery;
					$array_counter++;
				} 

			}

			function build_sorter($priority, $index) {
				return function ($a, $b) use ($priority, $index) {
					if($a[$priority] == $b[$priority]){
						return ($a[$index] < $b[$index]) ? -1 : 1;
					} else {
						return ($a[$priority] > $b[$priority]) ? -1 : 1;
					}
				};
			}

			usort($array_gallery, build_sorter('priority_img', 'index'));

			$array_counter=0;
			foreach ($array_gallery as $key_ordered_gallery => $val_ordered_gallery){
				if($val_ordered_gallery['gallery_img']==NULL){
					continue;
				}
				$ordered_gallery[$array_counter]=$val_ordered_gallery['gallery_img'];
				$array_counter++;
			}
		}
		//花絮照片排序EOL

    	$related_groups = \App\tab_groups::where('category_id', '=', $group->category_id)->where('tab_groups.enable', '=', 1)->where('tab_groups.reviewed', '=', 1)->limit(3)->get();
		return view('group')
            ->with('cover_image', $group->cover_image)
			->with('group', $group)
			->with('related_groups', $related_groups)
			->with('category', \App\tab_group_categorys::find($group->category_id))
			->with('author', \App\tab_authors::find($group->author_id))
			->with('description', $group->subtitle)
			->with('title', $group->title)
			->with('ordered_gallery', $ordered_gallery);
    }
}
