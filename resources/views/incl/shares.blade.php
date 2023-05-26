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