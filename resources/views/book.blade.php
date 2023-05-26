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
                        <header class="book-header">
                            <div class="book-header-cover">
                                <img src="/{{$tab_book->cover_image}}" alt="">
                            </div>
                            <div class="book-header-data">
                                <h1 class="book-header-title">{{$tab_book->title}}</h1>
                                {!!$tab_book->subtitle!!}
                            </div>
                        </header>
                        <div class="recommend-person-sm fixed">
                            <div class="art-item-avatar cover" style="background-image: url(/{{$tab_author->cover_image}});"></div>
                            <div class="recommend-person-intro">
                                <small>推薦人</small>
                                <br>
                                <span>{{$tab_author->name}}</span>
                            </div>
                        </div>
                        <main class="article-editor">
                            {!!$tab_book->content!!}
                        </main>
                        <section class="article-bottom">
                            <div class="article-bottom-section article-bottom-info author-data">
                                <a class="author-avatar" style="background-image: url('/{{$tab_author->cover_image}}');" href="/writers/{{$tab_author->id}}"></a>
                                <div class="author-content">
                                    <h6 class="author-name"><a href="/writers/{{$tab_author->id}}">{{$tab_author->name}}</a></h6>
                                    <div class="author-meta">{{$tab_author->job_title}}</div>
                                    <div class="author-intro">{!!$tab_author->intro!!}</div>
                                </div>
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
                                    <a class="article-share-item" href="mailto:?subject=分享給你：{{App::environment('APP_TITLE')}}&body=<?=strip_tags($description);?> {{Request::url()}}" title="用 Email 分享給朋友">
                                        <i class="icon-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                        @if(0)
                        <!--選書數量不大，先hide起來-->
                        <section class="relations">
                            <h4 class="section-title">相關選書</h4>
                            <div class="f-row">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                ?>
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <div class="bookcover-wrap">
                                        <a class="art-item-bookcover cover" style="background-image: url();" href="book.php"></a>
                                    </div>
                                    <div class="art-item-content">
                                        <h3 class="art-item-title">
                                            <a href="book.php">成功率95%的雪球魔法：楊美娟教你冠軍人生與事業該知道的事</a>
                                        </h3>
                                        <div class="recommend-person-sm">
                                            <div class="art-item-avatar cover"></div>
                                            <div class="recommend-person-intro">
                                                <small>推薦人</small>
                                                <br>
                                                <span>黃正民</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="more-btn" href="book.php">立即閱讀</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                        @endif
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>

                            <div class="pager">
<!--                                 <a class="pager-link pager-prev" href="article.php">上一則</a>
                                <a class="pager-link pager-next" href="article.php">下一則</a> -->
                                <a class="pager-link pager-list" href="/books">回列表</a>
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