<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index() {
    	$nowDatetime = time();
    	// $group_ad1 = \App\tab_groups::selectRaw('tab_groups.id, tab_group_categorys.name, tab_groups.title, tab_groups.published_date, tab_groups.subtitle, tab_groups.cover_image, tab_members.name as memberName')
        //                             ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_groups.ad_position_id')
        //                             ->leftJoin('tab_members', 'tab_members.id', '=', 'tab_groups.author_id')
        //                             ->leftJoin('tab_group_categorys', 'tab_group_categorys.id', '=', 'tab_groups.category_id')
        //                             ->where('tab_groups.enable', '=', 1)
        //                             ->where('ad_position_id', '=', 1)
    	// 							->where('ad_schedule_begin', '>=', $nowDatetime)
    	// 							->where('ad_schedule_end', '<=', $nowDatetime)
        //                             ->orderBy('ad_schedule_begin');

		$groups = \App\tab_groups::selectRaw('tab_groups.id, tab_group_categorys.name, tab_groups.title, tab_groups.published_date, tab_groups.subtitle, tab_groups.cover_image, tab_authors.name as memberName, tab_group_article_categories.name as article_category_name, tab_group_article_categories.list_color')
                                ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_groups.author_id')
                                ->leftJoin('tab_group_categorys', 'tab_group_categorys.id', '=', 'tab_groups.category_id')
                                ->leftJoin('tab_group_article_categories', 'tab_group_article_categories.id', '=', 'tab_groups.group_article_categories_id')
                                ->where('tab_groups.enable', '=', 1)
                                ->where('tab_groups.reviewed', '=', 1)
								->orderBy('tab_groups.priority', 'DESC')
                                ->orderBy('tab_groups.id', 'DESC')
                                ->get();
		$categorys = \App\tab_group_categorys::where('enable', '=', 1)->orderby('priority','DESC')->get();
		$group_category_id = 0; //預設為不分類

    	return view('groups')
            ->with('groups', $groups)
    		->with('categorys', $categorys)
    		->with('group_category_id', $group_category_id)
            ->with('title', 'Groups');
	}

	public function show($group_category_id){
        if( is_numeric($group_category_id) ){
            $tab_groups_categorys = \App\tab_group_categorys::find($group_category_id);
        }else{
            $tab_groups_categorys = \App\tab_group_categorys::where( 'name', 'like', '%'.$group_category_id.'%'  )->first();
        }
        if($tab_groups_categorys){
            $group_category_id = $tab_groups_categorys->id;
        }else{
            return redirect('/groups');
        }

    	$nowDatetime = time();
    	// $group_ad1 = \App\tab_groups::selectRaw('tab_groups.id, tab_group_categorys.name, tab_groups.title, tab_groups.published_date, tab_groups.subtitle, tab_groups.cover_image, tab_members.name as memberName')
        //                             ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_groups.ad_position_id')
        //                             ->leftJoin('tab_members', 'tab_members.id', '=', 'tab_groups.author_id')
        //                             ->leftJoin('tab_group_categorys', 'tab_group_categorys.id', '=', 'tab_groups.category_id')
        //                             ->where('tab_groups.enable', '=', 1)
        //                             ->where('ad_position_id', '=', 1)
    	// 							->where('ad_schedule_begin', '>=', $nowDatetime)
    	// 							->where('ad_schedule_end', '<=', $nowDatetime)
        //                             ->where('category_id', '=', $group_category_id)
        //                             ->orderBy('ad_schedule_begin');

		$groups = \App\tab_groups::selectRaw('tab_groups.id, tab_group_categorys.name, tab_groups.title, tab_groups.published_date, tab_groups.subtitle, tab_groups.cover_image, tab_authors.name as memberName, tab_group_article_categories.name as article_category_name, tab_group_article_categories.list_color')
                                ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_groups.author_id')
                                ->leftJoin('tab_group_categorys', 'tab_group_categorys.id', '=', 'tab_groups.category_id')
                                ->leftJoin('tab_group_article_categories', 'tab_group_article_categories.id', '=', 'tab_groups.group_article_categories_id')
								->whereRaw('category_id = ' . $group_category_id)
                                ->where('tab_groups.enable', '=', 1)
                                ->where('tab_groups.reviewed', '=', 1)
								->orderBy('tab_groups.priority', 'DESC')
                                ->orderBy('tab_groups.id', 'DESC')
                                ->get();

		$categorys = \App\tab_group_categorys::where('enable', '=', 1)->orderby('priority','DESC')->get();

    	return view('groups')
    		->with('groups', $groups)
    		->with('categorys', $categorys)
    		->with('group_category_id', $group_category_id)
            ->with('title', 'Groups');
    }
}
