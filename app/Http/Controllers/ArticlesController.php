<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() {
    	$nowDatetime = time();
    	$article_ad1 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 1)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->orderBy('ad_schedule_begin');
    								
		$article_ad2 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 2)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->orderBy('ad_schedule_begin');

		$articles = \App\tab_articles::select(['tab_articles.id', 'tab_article_categorys.name', 'tab_articles.title', 'tab_articles.created_at', 'tab_articles.subtitle', 'tab_articles.cover_image'])
                                ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
                                ->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                                ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                ->where('tab_articles.enable', '=', 1)
                                ->where('tab_articles.reviewed', '=', 1)
                                ->where(function($query){
                                    $query->where('ad_position_priority', '=', 99)
                                            ->orWhereNull('ad_position_priority');
                                })

                                //->where('ad_schedule_end', '<=', $nowDatetime)
								->orderBy('tab_articles.priority', 'DESC')
                                ->orderBy('tab_articles.id', 'DESC');

        $categorys = \App\tab_article_categorys::where('enable', '=', 1)->orderBy('priority', 'DESC')->get();

        $article_category_id = 0; //預設為不分類

    	return view('articles')
    		->with('article_ad1', $article_ad1->get())
    		->with('article_ad2', $article_ad2->get())
    		->with('articles', $articles->get())
    		->with('categorys', $categorys)
    		->with('article_category_id', $article_category_id)
            ->with('title', '專欄分享');
	}

    public function show($article_category_id)
    {

        if (is_numeric($article_category_id)) {
            $tab_article_categorys = \App\tab_article_categorys::find($article_category_id);
        } else {
            $tab_article_categorys = \App\tab_article_categorys::where('name', 'like', '%' . $article_category_id . '%')->first();
        }
        if ($tab_article_categorys) {
            $article_category_id = $tab_article_categorys->id;
        } else {
            return redirect('/articles');
        }
		
    	$nowDatetime = time();
    	$article_ad1 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 1)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->where('category_id', '=', $article_category_id)
                                    ->orderBy('ad_schedule_begin');
    								
		$article_ad2 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('reviewed', '=', 1)
                                    ->where('ad_position_id', '=', 2)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->where('category_id', '=', $article_category_id)
                                    ->orderBy('ad_schedule_begin');

		$articles = \App\tab_articles::select(['tab_articles.id', 'tab_article_categorys.name', 'tab_articles.title', 'tab_articles.created_at', 'tab_articles.subtitle', 'tab_articles.cover_image'])
                                ->where('tab_articles.enable', '=', 1)
                                ->where('tab_articles.reviewed', '=', 1)
                                ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
                                ->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                                ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
								//->where('ad_schedule_end', '<=', $nowDatetime)
								->whereRaw('category_id = ' . $article_category_id . ' AND (ad_position_priority = 99 OR ad_position_priority IS NULL)')
								->orderBy('tab_articles.priority', 'DESC')
                                ->orderBy('tab_articles.id', 'DESC');

        $categorys = \App\tab_article_categorys::where('enable', '=', 1)->orderBy('priority', 'DESC')->get();

    	return view('articles')
    		->with('article_ad1', $article_ad1->get())
    		->with('article_ad2', $article_ad2->get())
    		->with('articles', $articles->get())
    		->with('categorys', $categorys)
    		->with('article_category_id', $article_category_id)
            ->with('title', '專欄分享');
    }
}
