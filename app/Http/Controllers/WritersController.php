<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class WritersController extends Controller
{
    public function index() {

    	return view('writers')
                    ->with('authors', \App\tab_authors::where('enable','=', 1)->where('reviewed', '=', 1)->orderBy('priority', 'desc')->orderBy('id', 'DESC')->get() )
                    ->with('title', '人物介紹');
    }

    public function show($id) {
        $checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
            $author = \App\tab_authors::where('id','=', $id)->first();
            if($author == false) return redirect('/writers', 302)->with('alert', '查無資料');
    	    $articles = \App\tab_articles::select(['tab_articles.*', 'tab_article_categorys.name as category_name'])
    	    							->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                                        ->where('author_id', '=', $id)->where('tab_articles.enable', '=', 1)->where('tab_articles.reviewed', '=', 1)->get();
        } else {
            $author = \App\tab_authors::where('id','=', $id)->where('enable', '=', 1)->where('reviewed', '=', 1)->first();
            if($author == false) return redirect('/writers', 302)->with('alert', '查無資料');
    	    $articles = \App\tab_articles::select(['tab_articles.*', 'tab_article_categorys.name as category_name'])
    	    							->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                                        ->where('author_id', '=', $id)->where('tab_articles.enable', '=', 1)->where('tab_articles.reviewed', '=', 1)->get();
        }

        if($articles == false){
            return redirect('/writers', 302)->with('alert', '查無資料');
        }
        
        $recommendationBooks = \App\tab_books::where('recommend_person_author_id' , '=', $id)->where('tab_books.enable', '=', 1)->where('tab_books.reviewed', '=', 1)->get();
        $relatedGroups = \App\tab_groups::select(['tab_groups.*', 'tab_group_categorys.name as category_name','tab_group_article_categories.name as article_category_name', 'tab_group_article_categories.list_color'])
                                        ->leftJoin('tab_group_categorys', 'tab_group_categorys.id', '=', 'tab_groups.category_id')
                                        ->leftJoin('tab_group_article_categories', 'tab_group_article_categories.id', '=', 'tab_groups.group_article_categories_id')
                                        ->where('author_id', '=', $id)->where('tab_groups.enable', '=', 1)->where('tab_groups.reviewed', '=', 1)->get();
    	return view('writer')
    			->with('author', $author)
    			->with('articles', $articles)
                ->with('description', $author->name . ' / ' . $author->job_title)
                ->with('title', $author->name)
                ->with('recommendationBooks', $recommendationBooks)
                ->with('relatedGroups', $relatedGroups);
    }
}
