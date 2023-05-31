<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class ArticleController extends Controller
{
    public function index(){
		return redirect('/articles');
    }

    public function show($id){
		$checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
    		$article = \App\tab_articles::select(['tab_articles.*', 'tab_authors.name', 'tab_authors.cover_image AS author_cover_image'])
    							->where('tab_articles.id', '=', $id)
    							->join('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
    							->first();
		} else {
			$article = \App\tab_articles::select(['tab_articles.*', 'tab_authors.name', 'tab_authors.cover_image AS author_cover_image'])
    							->where('tab_articles.id', '=', $id)
        	                    ->where('tab_articles.enable', '=', 1)
								->where('tab_articles.reviewed', '=', 1)
    							->join('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
    							->first();
		}

        if($article == false){
            return redirect('/articles', 302)->with('alert', '查無此文章');
        }
		
    	$related_articles = \App\tab_articles::where('category_id', '=', $article->category_id)->where('tab_articles.enable', '=', 1)->where('tab_articles.reviewed', '=', 1)->limit(3)->orderBy('tab_articles.priority', 'DESC')->orderBy('tab_articles.id', 'DESC')->get();
		return view('article')
            ->with('cover_image', $article->cover_image)
			->with('article', $article)
			->with('related_articles', $related_articles)
			->with('category', \App\tab_article_categorys::find($article->category_id))
			->with('author', \App\tab_authors::find($article->author_id))
			->with('description', $article->subtitle)
			->with('title', $article->title);
    }
}
