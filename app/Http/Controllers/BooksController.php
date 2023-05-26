<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class BooksController extends Controller
{
    public function index() {
    	$nowDatetime = date('YmdHis');
		$books = \App\tab_books::select(['tab_books.*', 'tab_authors.name AS author_name', 'tab_authors.cover_image AS author_cover_image'])
					->leftJoin('tab_authors', 'tab_authors.id', '=', 'tab_books.recommend_person_author_id')
					->where('tab_books.enable', '=', 1)
					->where('tab_books.reviewed', '=', 1)
					->orderBy('tab_books.priority', 'DESC')
					->orderBy('tab_books.id', 'DESC')
					->get();
    	return view('books')
    		->with('books', $books)
    		->with('title', '選書');
	}

	public function show($id){
		$checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
			$tab_book = \App\tab_books::where('id', '=', $id)->first();
		} else {
			$tab_book = \App\tab_books::where('id', '=', $id)->where('tab_books.enable', '=', 1)->where('tab_books.reviewed', '=', 1)->first();
		}

        if($tab_book == false){
            return redirect('/books', 302)->with('alert', '查無此書');
        }

		$related_books = \App\tab_books::where('tab_books.enable', '=', 1)->where('tab_books.reviewed', '=', 1)->orderBy('id', 'DESC')->limit(3)->get();
		$tab_author = \App\tab_authors::find( $tab_book->recommend_person_author_id );
		return view('book')
			->with('cover_image', $tab_book->cover_image)
			->with('tab_book', $tab_book)
			->with('tab_author', $tab_author)
			->with('description', $tab_book->subtitle)
			->with('title', $tab_book->title);
	}
}
