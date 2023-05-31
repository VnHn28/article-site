<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class EventsController extends Controller
{
    public function index() {
    	$nowDatetime = date('YmdHis');
		$events = \App\tab_events::where('tab_events.enable', '=', 1)
									->where('tab_events.reviewed', '=', 1)
									->orderBy('tab_events.priority', 'DESC')
									->orderBy('tab_events.id', 'DESC')
									->get();
    	return view('events')
    			->with('events', $events)
    			->with('title', '活動快訊');
	}

	public function show($id){
		$checkAdmin = CRUDBooster::myId();
		if($checkAdmin){
			$tab_event = \App\tab_events::where('id', '=', $id)->first();
		} else {
			$tab_event = \App\tab_events::where('id', '=', $id)->where('tab_events.enable', '=', 1)->where('tab_events.reviewed', '=', 1)->first();
		}

        if($tab_event == false){
            return redirect('/events', 302)->with('alert', '查無此活動');
        }
		
		$related_events = \App\tab_events::where('tab_events.enable', '=', 1)->where('tab_events.reviewed', '=', 1)->orderBy('tab_events.priority', 'DESC')->orderBy('tab_events.id', 'DESC')->orderBy('event_begin_time')->limit(3)->get();
		return view('event')
				->with('cover_image', $tab_event->cover_image)
				->with('tab_event', $tab_event)
				->with('related_events', $related_events)
				->with('description', $tab_event->subtitle)
				->with('title', $tab_event->title);
	}
}
