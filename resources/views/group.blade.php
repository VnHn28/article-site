<!DOCTYPE html>
<html lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @include('incl/meta')
        @include('incl/settings')
    </head>
    <body>
        <!-- group.blade.php -->
        <div id="wrap">
            @include('incl/header')
            <!-- 廣告_手機版 111.01.25 先隱藏廣告欄位 -->
            <a id="ad_001_m" class="ad_20200122_article guangao-item" target="_blank"
                href="https://www.facebook.com/commerce/products/3234743803219309/" style="text-align: right">
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
                                <span class="article-meta-item">{{$group->member_name}}</span>
                                <span class="article-meta-item">{{substr($group->published_date,0,10)}}</span>
                            </div>
                            <h1 class="article-title">{{$group->title}}</h1>
                            @if(0)
                            <img class="article-cover" src="/{{$group->cover_image}}">
                            <p class="article-lead">{{$group->subtitle}}</p>
                            @endif
                        </header>
                        <main class="article-editor">
                            {!!$group->content!!}
                        </main>
                        <?php 
                            if(0){
                        ?>
                        <!-- 精選花絮 SOL -->
                        @if($group->display_gallery == 1)
                            <section class="article-album">
                                <h2 class="title"><img src="img/icon_album.png" alt="">精選花絮</h2>
                                <div class="album">
                                @if($group->gallery_img1)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img1}}">
                                        <img src="/{{$group->gallery_img1}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img2)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img2}}">
                                        <img src="/{{$group->gallery_img2}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img3)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img3}}">
                                        <img src="/{{$group->gallery_img3}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img4)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img4}}">
                                        <img src="/{{$group->gallery_img4}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img5)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img5}}">
                                        <img src="/{{$group->gallery_img5}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img6)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img6}}">
                                        <img src="/{{$group->gallery_img6}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img7)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img7}}">
                                        <img src="/{{$group->gallery_img7}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img8)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img8}}">
                                        <img src="/{{$group->gallery_img8}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img9)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img9}}">
                                        <img src="/{{$group->gallery_img9}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img10)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img10}}">
                                        <img src="/{{$group->gallery_img10}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img11)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img11}}">
                                        <img src="/{{$group->gallery_img11}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                @if($group->gallery_img12)
                                    <a class="item venobox" data-gall="myGallery" href="/{{$group->gallery_img12}}">
                                        <img src="/{{$group->gallery_img12}}" alt="{{$group->title}}">
                                    </a>
                                @endif
                                </div>
                            </section>
                        @endif
                        <!-- 精選花絮 EOL -->
                        <?php 
                            }
                        ?>
                        <!-- 排序精選花絮 SOL -->
                        @if($group->display_gallery == 1)
                            <section class="article-album">
                                <h2 class="title"><img src="img/icon_album.png" alt="">精選花絮</h2>
                                <div class="album">
                                @if(isset($ordered_gallery))
                                    @foreach($ordered_gallery as $val_gallery)
                                        <a class="item venobox" data-gall="myGallery" href="/{{$val_gallery}}">
                                            <img src="/{{$val_gallery}}" alt="{{$group->title}}">
                                        </a>
                                    @endforeach
                                @endif
                                </div>
                            </section>
                        @endif
                        <!-- 排序精選花絮 EOL -->
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
                                    <a class="article-share-item" href="mailto:?subject={{App::environment('APP_TITLE')}}&body={{$title}} {{Request::url()}}" title="用 Email 分享給朋友">
                                        <i class="icon-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                        @if(0)
                        <section class="relations">
                            <h4 class="section-title">相關團體</h4>
                            <div class="f-row">
                                @foreach($related_groups as $related_group)
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url(/{{$related_group->cover_image}});" href="/article/{{$related_group->id}}"></a>
                                    <div class="art-item-content">
                                        <div class="art-item-meta">
                                            <span class="meta">{{substr($related_group->published_date,0,10)}}</span>
                                        </div>
                                        <h3 class="art-item-title">
                                            <a href="/article/{{$related_group->id}}">{{$related_group->title}}</a>
                                        </h3>
                                        <p class="art-item-intro">{{$related_group->subtitle}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        @endif
                        <footer class="article-footer hide">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>
                            <div class="pager">
<!--                            <a class="pager-link pager-prev" href="/article/prev">上一則</a>
                                <a class="pager-link pager-next" href="/article/next">下一則</a> -->
                                <a class="pager-link pager-list" href="/groups">回列表</a>
                            </div>
                        </footer>
                    </article>
                     <!-- 右側 pc版廣告Banner SOL -->
                     <!--
                        <aside class="article-side f-col-12 f-col-md-4">
                            <br />
                            <section class="side-section">
                                <div class="guangao">
                                    <a id="ad_001" class="ad_20200122_side guangao-item" target="_blank"
                                        href="https://www.facebook.com/commerce/products/3234743803219309/"
                                        style="text-align: right">
                                        <img id="ad_001_img" src="/ad_banners/C-300x250.png">
                                    </a>
                                    <a id="ad_002" class="ad_20200122_side guangao-item" target="_blank"
                                        href="https://www.google.com/feedback"><img id="ad_002_img" src="img/banner.jpg">
                                    </a>
                                </div>
                            </section>
                        </aside>
                        -->
                    <!-- 右側 pc版廣告Banner EOL -->
                    @include('incl/side')
                </div>
            </main>
        </div>
        @include('incl/footer')
        <script src="/js/group/venobox.min.js"></script>
        <script>
            $(function () {
                $('.venobox').venobox();
            });
        </script>
    </body>
</html>