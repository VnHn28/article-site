<!DOCTYPE html>
<html lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @include('incl/meta')
        @include('incl/settings')
    </head>
    <body>
        <div id="wrap">
            @include('incl/header')
            <main id="main" class="l-container">
                <div class="f-row hasMediumItem">
                    @foreach($events as $event)
                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                        <a class="art-item-cover cover" style="background-image: url(/{{$event->cover_image}});" href="/events/{{$event->id}}"></a>
                        <div class="art-item-content">
                            <h3 class="art-item-title">
                                <a href="/events/{{$event->id}}">{{$event->name}}</a>
                            </h3>
                            <div class="evt-item-meta">
                                <div class="meta">{{$event->title}}</div>
                                <div class="meta">主辦單位：{{$event->organization_name}}</div>
                                <div class="meta">活動日期：{{substr($event->event_begin_time, 0, 10)}}</div>
                            </div>
                            <p class="art-item-intro">{{$event->subtitle}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if(0)
                <ul class="pagi">
                    <li class="pagi-item"><span class="pagi-text">«</span></li>
                    <li class="pagi-item active"><a class="pagi-link">1</a></li>
                    <li class="pagi-item"><a class="pagi-link">2</a></li>
                    <li class="pagi-item"><a class="pagi-link">3</a></li>
                    <li class="pagi-item"><span class="pagi-text">…</span></li>
                    <li class="pagi-item"><a class="pagi-link">10</a></li>
                    <li class="pagi-item"><a class="pagi-link">»</a></li>
                </ul>
                @endif
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>