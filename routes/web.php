<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$nowDatetime = date_create();
    $nowDatetime = date_format($nowDatetime,'Y-m-d H:i:s');

	//專欄
	$article_ad1 = \App\tab_articles::select(['tab_articles.*', 'tab_article_categorys.name as category_name'])
						->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.id')
						->where('tab_articles.enable', '=', 1)
						->where('tab_articles.reviewed', '=', 1)
						->where('ad_position_id', '=', 1)
						->where('ad_schedule_begin', '<=', $nowDatetime)
						->where('ad_schedule_end', '>=', $nowDatetime)
						->orderBy('tab_articles.priority', 'DESC');

	$article_ad2 = \App\tab_articles::select(['tab_articles.*', 'tab_article_categorys.name as category_name'])
						->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.id')
						->where('tab_articles.enable', '=', 1)
						->where('tab_articles.reviewed', '=', 1)
						->where('ad_position_id', '=', 2)
						->where('ad_schedule_begin', '<=', $nowDatetime)
						->where('ad_schedule_end', '>=', $nowDatetime)
						->orderBy('tab_articles.priority', 'DESC');

	$articles = \App\tab_articles::select(['tab_articles.id', 'tab_article_categorys.name as category_name', 'tab_articles.title', 'tab_articles.published_date', 'tab_articles.subtitle', 'tab_articles.cover_image'])
                        ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
                        ->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                        ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                        ->where('tab_articles.enable', '=', 1)
						->where('tab_articles.reviewed', '=', 1)
						->where(function($query){
							$query->where( 'ad_position_priority', '=', 99 )
							->orWhereNull('ad_position_priority');
						})
						->limit(8)
						->orderBy('tab_articles.priority', 'DESC')
						->orderBy('tab_articles.id', 'DESC');


	//活動
	$events = \App\tab_events::where('tab_events.enable', '=', 1)
									->where('tab_events.reviewed', '=', 1)
									->orderBy('tab_events.priority', 'DESC')
									->orderBy('tab_events.id', 'DESC')
									->limit(4)
									->get();

	//選書
	$books = \App\tab_books::select(['tab_books.*', 'tab_authors.name AS author_name', 'tab_authors.cover_image AS author_cover_image'])
						->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_books.recommend_person_author_id')
						->orderBy('tab_books.priority', 'DESC')
						->orderBy('tab_books.id', 'DESC')
						->where('tab_books.enable', '=', 1)
						->where('tab_books.reviewed', '=', 1)
						->limit(4)
						->get();

	//選店
	$store_ad1 = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
						->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
						->where('tab_stores.enable', '=', 1)
						->where('tab_stores.reviewed', '=', 1)
						->where('ad_position_id', '=', 1)
						->where('ad_schedule_begin', '<=', $nowDatetime)
						->where('ad_schedule_end', '>=', $nowDatetime)
						->orderBy('tab_stores.priority', 'DESC');

	$stores = \App\tab_stores::select(['tab_stores.*', 'tab_store_categorys.name as category_name'])
						->leftJoin('tab_store_categorys', 'tab_store_categorys.id', '=', 'tab_stores.category_id')
						->where('tab_stores.enable', '=', 1)
						->where('tab_stores.reviewed', '=', 1)
						->where('ad_schedule_end', '>=', $nowDatetime)
						->orderBy('tab_stores.priority', 'DESC')
						->limit(6)
						->get();
    // return $stores;

	return view('welcome')
		->with('article_ad1', $article_ad1->first())
		->with('article_ad2', $article_ad2->first())
		->with('articles', $articles->get())
		->with('events', $events)
		->with('books', $books)
		->with('store_ad1', $store_ad1->first())
		->with('stores', $stores);
});

Route::Resource('/articles', 'ArticlesController');

Route::get('articlestest/api', function(){
    	$nowDatetime = time();
    	$article_ad1 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('ad_position_id', '=', 1)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->orderBy('ad_schedule_begin');
    								
		$article_ad2 = \App\tab_articles::leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                    ->where('enable', '=', 1)
                                    ->where('ad_position_id', '=', 2)
    								->where('ad_schedule_begin', '>=', $nowDatetime)
    								->where('ad_schedule_end', '<=', $nowDatetime)
                                    ->orderBy('ad_schedule_begin');

		$articles = \App\tab_articles::select(['tab_articles.id', 'tab_article_categorys.name', 'tab_articles.title', 'tab_articles.created_at', 'tab_articles.subtitle', 'tab_articles.cover_image'])
                                ->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_articles.author_id')
                                ->leftJoin('tab_article_categorys', 'tab_article_categorys.id', '=', 'tab_articles.category_id')
                                ->leftJoin('tab_ad_positions', 'tab_ad_positions.id', '=', 'tab_articles.ad_position_id')
                                ->where('tab_articles.enable', '=', 1)
                                ->where(function($query){
                                    $query->where('ad_position_priority', '=', 99)
                                            ->orWhereNull('ad_position_priority');
                                })

                                //->where('ad_schedule_end', '<=', $nowDatetime)
								->orderBy('tab_articles.priority', 'DESC');

		$categorys = \App\tab_article_categorys::all();

        $article_category_id = 0; //預設為不分類

        $ary['article_ad1'] = $article_ad1->get();
        $ary['article_ad2'] = $article_ad2->get();
        $ary['articles'] = $articles->get();
        $ary['categorys'] = $categorys;
        $ary['article_category_id'] = $article_category_id;
        $ary['title'] = '專欄分享';

        return $ary;
});

//TEST VUE
Route::get('/articlestest', function(){
	return view('articlesbodytest');
	// return 'test';
});

Route::Resource('/article', 'ArticleController');

Route::Resource('/groups', 'GroupsController');

Route::Resource('/group', 'GroupController');

Route::Resource('/events', 'EventsController');

Route::Resource('/books', 'BooksController');

Route::Resource('/stores', 'StoresController');
Route::Resource('/store', 'StoreController');

Route::Resource('/writers', 'WritersController');

Route::get('/about_channel', function(){
	return view('about_channel');
});

Route::get('/ads', function(){
	return view('ads');
});

Route::get('/submit', function(){
	return view('submit');
});

Route::get('/about_circles', function(){
	return view('about_circles');
});

Route::get('/contact', function(){
	return view('contact');
});

Route::get('/join', function(){
	return view('join');
});

Route::get('/terms', function(){
	return view('terms');
});

Route::get('/privacy', function(){
	return view('privacy');
});

Route::get('/cookie', function(){
	return view('cookie');
});


Route::get('/admin/module_generator/step3/{id}', 'ModulsController@getStep3');