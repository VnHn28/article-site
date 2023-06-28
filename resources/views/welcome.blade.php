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

                @if(!$articles->isEmpty())
                <div class="cat-section">
                    <div class="f-row hasLargeItem">
                        @if($article_ad1)
                        <div class="art-item f-col-12 sz-lg">
                            <a class="art-item-cover cover" style="background-image: url(/{{$article->cover_image}});" href="/article/{{$article->id}}"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">{{$article->category_name}}</span>
                                    <!-- <span class="meta">{{substr($article->published_date,0,10)}}</span> -->
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/article/{{$article->id}}">{{$article->title}}</a>
                                </h3>
                                <p class="art-item-intro">{{$article->subtitle}}</p>
                            </div>
                        </div>
                        @endif
                        @if($article_ad2  )
                        <div class="art-item f-col-12 f-col-md-6 sz-md">
                            <a class="art-item-cover cover" style="background-image: url(/{{$article->cover_image}});" href="/article/{{$article->id}}"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">{{$article->category_name}}</span>
                                    <!-- <span class="meta">{{substr($article->published_date,0,10)}}</span> -->
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/article/{{$article->id}}">{{$article->title}}</a>
                                </h3>
                                <p class="art-item-intro">{{$article->subtitle}}</p>
                            </div>
                        </div>
                        @endif
                        @foreach($articles as $i => $article)
                        <?php
                            if($article_ad1 && $article_ad2){
                                $col = ' f-col-12 f-col-sm-6 f-col-md-3';
                                $sz = '';
                            }elseif($i == 1 && $article_ad1 == false && $article_ad2 == true){
                                $col = ' f-col-12 f-col-md-6';
                                $sz = ' sz-md';
                            }elseif($i == 0 && $article_ad1 == true && $article_ad2 == false){
                                $col = ' f-col-12 f-col-md-6';
                                $sz = ' sz-lg';
                            }else{
                                $col = ($i == 0) ? ' f-col-12' : (($i == 1) ? ' f-col-12 f-col-md-6' : ' f-col-12 f-col-sm-6 f-col-md-3');
                                $sz  = ($i == 0) ? ' sz-lg' : (($i == 1) ? ' sz-md' : '');
                            }
                        ?>
                        <div class="art-item<?=$sz . $col;?>">
                            <a class="art-item-cover cover" style="background-image: url(/{{$article->cover_image}});" href="/article/{{$article->id}}"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">{{$article->category_name}}</span>
                                    <!-- <span class="meta">{{substr($article->published_date,0,10)}}</span> -->
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/article/{{$article->id}}">{{$article->title}}</a>
                                </h3>
                                <p class="art-item-intro">{{$article->subtitle}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!$events->isEmpty())
                <div class="cat-section">
                    <h2 class="cat-section-title">近期活動</h2>
                    <div class="f-row onlySmallItem">
                        @foreach($events as $i => $event)
                        <?php
                        //for ($i = 0; $i < 4; $i++) {
                        ?>
                        <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                            <a class="art-item-cover cover" style="background-image: url(/{{$event->cover_image}});" href="/events/{{$event->id}}"></a>
                            <div class="art-item-content">
                                <h3 class="art-item-title">
                                    <a href="/events/{{$event->id}}">{{$event->title}}</a>
                                </h3>
                                <div class="evt-item-meta">
                                    <div class="meta">主辦單位：{{$event->organization_name}}</div>
                                    <div class="meta">活動日期：{{substr($event->event_begin_time, 0,10)}} @if(0)<span class="week">星期二</span>@endif</div>
                                </div>
                                <p class="art-item-intro">{{$event->subtitle}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!$books->isEmpty())
                <div class="cat-section">
                    <h2 class="cat-section-title">Circles 選書</h2>
                    <div class="f-row onlySmallItem">
                        @foreach($books as $i => $book)
                        <?php
                        //for ($i = 0; $i < 4; $i++) {
                        ?>
                        <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                            <div class="bookcover-wrap">
                                <a class="art-item-bookcover cover" style="background-image: url(/{{$book->cover_image}});" href="/books/{{$book->id}}"></a>
                            </div>
                            <div class="art-item-content">
                                <h3 class="art-item-title">
                                    <a href="/books/{{$book->id}}">{{$book->title}}</a>
                                </h3>
                                <div class="recommend-person-sm">
                                    <div class="art-item-avatar cover" style="background-image: url(/{{$book->author_cover_image}});" ></div>
                                    <div class="recommend-person-intro">
                                        <small>推薦人</small>
                                        <br>
                                        <span>{{$book->author_name}}</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="more-btn" href="/books/{{$book->id}}">立即閱讀</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!$stores->isEmpty())
                <div class="cat-section hasMediumItem">
                    <h2 class="cat-section-title">Circles 選店</h2>
                    <div class="f-row">
                        @if($store_ad1)
                        <div class="art-item f-col-12 f-col-md-6 sz-md">
                            <a class="art-item-cover cover" style="background-image: url(/{{$store_ad1->cover_image}});" href="/store/{{$store_ad1->id}}"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">{{$store->category_name}}</span>
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/store/{{$store_ad1->id}}">{{$store->title}}</a>
                                </h3>
                                <p class="art-item-intro">{!!$store->subtitle!!}</p>
                            </div>
                        </div>
                        @endif

                        @foreach($stores as $i => $store)
                            @if($store_ad1 == false && $i == 0)
                            <div class="art-item f-col-12 f-col-md-6 sz-md">
                            @else
                            <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                            @endif
                                <a class="art-item-cover cover" style="background-image: url(/{{$store->cover_image}});" href="/store/{{$store->id}}"></a>
                                <div class="art-item-content">
                                    <div class="art-item-meta">
                                        <span class="meta">{{$store->category_name}}</span>
                                    </div>
                                    <h3 class="art-item-title">
                                        <a href="/store/{{$store->id}}">{{$store->title}}</a>
                                    </h3>
                                    <p class="art-item-intro">{!!$store->subtitle!!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>