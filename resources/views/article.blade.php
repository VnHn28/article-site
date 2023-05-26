<!DOCTYPE html>
<html lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @include('incl/meta')
        @include('incl/settings')
    </head>
    <body>
        <div id="wrap">
            @include('incl/header')
            <!-- 廣告 -->
            <a id="ad_001_m" class="ad_20200122_article guangao-item" target="_blank" href="https://www.facebook.com/commerce/products/3234743803219309/" style="text-align: right">
                <span id="ad_001_m_close" class="close"></span>
                <img id="ad_001_m_img" src="/ad_banners/D-384x68.png?5614651">
            </a>
            <!-- 廣告 -->
            <main id="main" class="l-container">
                <div class="f-row">
                    <article class="article-body f-col-12 f-col-md-8">
                        <header class="article-header">
                            <div class="article-metas">
                                <span class="article-meta-item">{{$category->name}}</span>
                                <span class="article-meta-item">{{$article->name}}</span>
                                <span class="article-meta-item">{{$article->created_at->format('Y/m/d')}}</span>
                            </div>
                            <h1 class="article-title">{{$article->title}}</h1>
                            @if(0)
                            <img class="article-cover" src="/{{$article->cover_image}}">
                            <p class="article-lead">{{$article->subtitle}}</p>
                            @endif
                        </header>
                        <main class="article-editor">
                            {!!$article->content!!}
                        </main>
                        <section class="article-bottom">
                            <div class="article-bottom-section article-bottom-info author-data">
                                <a class="author-avatar" href="/writers/{{$author->id}}" style="background-image: url(/{{$author->cover_image}});"></a>
                                <div class="author-content">
                                    <h6 class="author-name"><a href="/writers/{{$author->id}}">{{$author->name}}</a></h6>
                                    <div class="author-meta">{!!$author->job_title!!}</div>
                                    <div class="author-intro">{!!$author->intro!!}</div>
                                </div>
                            </div>
                            <div class="article-bottom-section article-shares">
                                <span class="article-share-txt">@lang('global.i_want_share')</span>
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
                                    <a class="article-share-item" href="mailto:?subject={{App::environment('APP_TITLE')}}&body={{$title}} {{Request::url()}}" title="用 Email 分享給朋友">
                                        <i class="icon-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section class="relations">
                            <h4 class="section-title">@lang('articles.Related Articles')</h4>
                            <div class="f-row">
                                @foreach($related_articles as $related_article)
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url(/{{$related_article->cover_image}});" href="/article/{{$related_article->id}}"></a>
                                    <div class="art-item-content">
                                        <div class="art-item-meta">
                                            <span class="meta">{{$related_article->created_at->format('Y/m/d')}}</span>
                                        </div>
                                        <h3 class="art-item-title">
                                            <a href="/article/{{$related_article->id}}">{{$related_article->title}}</a>
                                        </h3>
                                        <p class="art-item-intro">{{$related_article->subtitle}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <footer class="article-footer hide">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>
                            <div class="pager">
<!--                                 <a class="pager-link pager-prev" href="/article/prev">上一則</a>
                                <a class="pager-link pager-next" href="/article/next">下一則</a> -->
                                <a class="pager-link pager-list" href="/articles">@lang('articles.back_to_list')</a>
                            </div>
                        </footer>
                    </article>
                    @include('incl/side')
                </div>
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>