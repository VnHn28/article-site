<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class StoreController extends Controller
{
    public function index() {
    	return redirect('/stores');
	}

	public function show($id){
		$id = (int)$id;
    	$nowDatetime = date('YmdHis');
		$checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
			$store = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
									->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
									->where('tab_stores.id', '=', $id)
									->first();
		} else {
			$store = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
									->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
									->where('tab_stores.id', '=', $id)
									->where('tab_stores.enable', '=', 1)
									->where('tab_stores.reviewed', '=', 1)
									->first();
		}

		if($store == false){
			return redirect('/stores', 302)->with('alert', '查無資料');
		}

		$related_stores = \App\tab_stores::where('tab_stores.enable', '=', 1)->where('tab_stores.reviewed', '=', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
    	return view('store')
    			->with('cover_image', $store->cover_image)
	    		->with('store', $store)
	    		->with('related_stores', $related_stores)
	    		->with('description', $store->subtitle)
				->with('title', $store->title);
	}
}
