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
                <div class="f-row">
                    <article class="article-body f-col-12 f-col-md-8">
                        <header class="article-header">
                            <div class="article-metas">
                                <span class="article-meta-item">{{$store->category_name}}</span>
                                <span class="article-meta-item">{{substr($store->published_date,0,10)}}</span>
                            </div>
                            <h1 class="article-title">{{$store->title}}</h1>
                            <img class="article-cover" src="/{{$store->cover_image}}">
                            <p class="article-lead">{{$store->subtitle}}</p>
                        </header>
                        <main class="article-editor">
                            {!!$store->content!!}
                        </main>
                        @if(0)
                        <section class="article-map">
                            <div id="map_canvas" class="googlemap"></div>
                        </section>
                        @endif
                        <section class="article-bottom">
                            <div class="article-bottom-section article-bottom-info store-data">
                                <h4 class="store-data-name">{{$store->title}}</h4>
                                {!!$store->sub_content!!}
                            </div>
                            <div class="article-bottom-section article-shares">
                                <span class="article-share-txt">我要分享</span>
                                <div class="article-share-btn">
                                    <a class="article-share-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&t={{App::environment('APP_TITLE')}}" title="分享到 Facebook">
                                        <i class="icon-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a class="article-share-item" target="_blank" href="https://twitter.com/intent/tweet?source={{Request::url()}}&text={{App::environment('APP_TITLE')}}:{{Request::url()}}" title="分享到 Twitter">
                                        <i class="icon-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a class="article-share-item js-share-line" target="_blank" data-title="{{App::environment('APP_TITLE')}}" data-url="{{Request::url()}}" title="分享到 Line">
                                        <i class="icon-line" aria-hidden="true"></i>
                                    </a>
                                    <a class="article-share-item" href="mailto:?subject={{App::environment('APP_TITLE')}}&body=<?=$description;?> {{Request::url()}}" title="用 Email 分享給朋友">
                                        <i class="icon-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section class="relations">
                            <h4 class="section-title">更多選店</h4>
                            <div class="f-row">
                                <?php
                                //for ($i = 0; $i < 3; $i++) {
                                ?>
                                @foreach($related_stores as $related_store)
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url(/{{$related_store->cover_image}});" href="/store/{{$related_store->id}}"></a>
                                    <div class="art-item-content">
                                        <div class="art-item-meta">
                                            <span class="meta">{{substr($related_store->published_date,0,10)}}</span>
                                        </div>
                                        <h3 class="art-item-title">
                                            <a href="/store/{{$related_store->id}}">{{$related_store->title}}</a>
                                        </h3>
                                        <p class="art-item-intro">{{$related_store->subtitle}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>

                            <div class="pager">
<!--                                 <a class="pager-link pager-prev" href="/articles/prev">上一則</a>
                                <a class="pager-link pager-next" href="/articles/next">下一則</a> -->
                                <a class="pager-link pager-list" href="/stores">回列表</a>
                            </div>
                        </footer>
                    </article>
                    @include('incl/side')
                </div>
            </main>
        </div>
        @include('incl/footer')
        <script>
            $(function() {
                $.googleMap.run('map_canvas', '{{$store->location}}');
            });
        </script>
    </body>
</html>