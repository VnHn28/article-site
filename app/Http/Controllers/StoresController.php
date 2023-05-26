<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoresController extends Controller
{
    //選店不分類列表
    public function index() {
    	$nowDatetime = date('YmdHis');
    	$stores_ad1 = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                    ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                    ->where('tab_stores.enable', '=', 1)
                                    ->where('tab_stores.reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 3)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime);
    								
		$stores_ad2 = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                    ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                    ->where('tab_stores.enable', '=', 1)
                                    ->where('tab_stores.reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 4)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime);

		$stores = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                ->where('tab_stores.enable', '=', 1)
                                ->where('tab_stores.reviewed', '=', 1)
                                ->where('ad_schedule_end', '<=', $nowDatetime)
								->orderBy('tab_stores.priority', 'DESC')
                                ->orderBy('tab_stores.id', 'DESC');

		$categorys = \App\tab_store_categorys::all();

		$category_id = 0; //預設為不分類

    	return view('stores')
                ->with('stores_ad1', $stores_ad1->get())
                ->with('stores_ad2', $stores_ad2->get())
                ->with('stores', $stores->get())
                ->with('categorys', $categorys)
                ->with('category_id', $category_id)
                ->with('title', '選店');
	}

    //選店分類別列表
	public function show($category_id){
        if( is_numeric($category_id) ){
            $tab_store_categorys = \App\tab_store_categorys::find($category_id);
        }else{
            $tab_store_categorys = \App\tab_store_categorys::where( 'name', 'like', '%'.$category_id.'%'  )->first();
        }
        if($tab_store_categorys){
            $category_id = $tab_store_categorys->id;
        }else{
            return redirect('/stores');
        }

    	$nowDatetime = date('YmdHis');
    	$stores_ad1 = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                    ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                    ->where('ad_position_id', '=', 3)
                                    ->where('tab_stores.enable', '=', 1)
                                    ->where('tab_stores.reviewed', '=', 1)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
    								->where('category_id', '=', $category_id);
    								
		$stores_ad2 = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                    ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                    ->where('ad_position_id', '=', 4)
                                    ->where('tab_stores.enable', '=', 1)
                                    ->where('tab_stores.reviewed', '=', 1)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
    								->where('category_id', '=', $category_id);

		$stores = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
                                ->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
                                ->where('ad_schedule_end', '<=', $nowDatetime)
								->where('tab_stores.enable', '=', 1)
                                ->where('tab_stores.reviewed', '=', 1)
                                ->where('category_id', '=', $category_id)
								->orderBy('tab_stores.priority', 'DESC')
                                ->orderBy('tab_stores.id', 'DESC');

		$categorys = \App\tab_store_categorys::all();

    	return view('stores')
    		->with('stores_ad1', $stores_ad1->get())
    		->with('stores_ad2', $stores_ad2->get())
    		->with('stores', $stores->get())
    		->with('categorys', $categorys)
    		->with('category_id', $category_id)
            ->with('title', '選店');
	}
}
