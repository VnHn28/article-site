<!-- side.blade.php -->
<aside class="article-side f-col-12 f-col-md-4">
    @if(0)
    <section class="side-section">
        <div class="article-shares">
            <span class="article-share-txt">我要分享</span>
            <div class="article-share-btn">
                <a class="article-share-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&t=<?=$title;?>" title="分享到 Facebook">
                    <i class="icon-facebook" aria-hidden="true"></i>
                </a>
                <a class="article-share-item" target="_blank" href="https://twitter.com/intent/tweet?source={{Request::url()}}&text=<?=$title;?>:{{Request::url()}}" title="分享到 Twitter">
                    <i class="icon-twitter" aria-hidden="true"></i>
                </a>
                <a class="article-share-item js-share-line" target="_blank" data-title="<?=$title;?>" data-url="{{Request::url()}}" title="分享到 Line">
                    <i class="icon-line" aria-hidden="true"></i>
                </a>
                <a class="article-share-item" href="mailto:?subject=<?=$title;?>&body=@yield('title') {{Request::url()}}" title="用 Email 分享給朋友">
                    <i class="icon-envelope" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
    @endif
    <br />
    @if(0)
    <section class="side-section">
        <div class="article-hots">
            <h4 class="article-hot-caption">熱門文章</h4>
            <div class="article-hot-list">
                <div class="article-hot-item">
                    <a class="article-hot-cover cover" style="background-image: url();" href="/articles/1"></a>
                    <h6 class="article-hot-title"><a href="/articles/1">28年磨一部片，名導史柯西斯獨家專訪</a></h6>
                    <p class="article-hot-intro">無論是電影《蠻牛》（Raging Bull）中，勞勃．狄尼洛（Robert De Niro）扮演的拳王，或是《華爾街之狼》（The Wolf of Wall Street）裡，李奧納多．狄卡皮歐（Leonardo DiCaprio）所詮釋的炒股大亨，橫跨七○年代至今，他一手培育出不少影帝、影后。</p>
                </div>
                <div class="article-hot-item">
                    <h6 class="article-hot-title"><a href="/articles/1">對公司和員工都好的管理法，32歲臉書女副總：不要想幫助不適任的人，請他離開就對了</a></h6>
                </div>
                <div class="article-hot-item">
                    <h6 class="article-hot-title"><a href="/articles/1">禽流感又來！到底染了H5N6會怎樣？</a></h6>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(0)
    <section class="side-section">
        <div class="article-hots">
            <h4 class="article-hot-caption">熱門店家</h4>
            <div class="article-hot-list">
                <div class="article-hot-item">
                    <a class="article-hot-cover cover" style="background-image: url();" href="/stores/1"></a>
                    <h6 class="article-hot-title"><a href="/articles/1">BorderLabs｜邊境實驗室</a></h6>
                    <p class="article-hot-intro">「邊境」通常給人印象為不確定、冒險、未知的情感，我們認為在創新的過程就像是身處於未知的邊境，有很多的可能性存在。另外「跨越自身經驗的邊境就是世界」，我們相信這跨越舒適圈的想法，更是呼應共創空間的精神。</p>
                </div>
                <div class="article-hot-item">
                    <h6 class="article-hot-title"><a href="/stores/1">稻舍URS329</a></h6>
                </div>
                <div class="article-hot-item">
                    <h6 class="article-hot-title"><a href="/stores/1">PICK&amp;EAT自由選食</a></h6>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="side-section">
        <div class="guangao">
            @if(0)
            <a class="guangao-item" target="_blank" href="http://thailandmarketing.ksdwebs.com/?adv={{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}">
                <img src="/ad_banners/A-390x271.gif">
            </a>
            @endif
            @if(0)
            <!-- 抖音連結合作結束，下架於12月25日byeddie -->
            <a class="guangao-item" target="_blank" href="http://tiktok.ksdwebs.com/?adv={{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}">
                <img src="/ad_banners/B-390x271-2.jpg">
            </a>
            @endif
            <!--  -->
            <a id="ad_001" class="ad_20200122_side guangao-item" target="_blank" href="https://www.facebook.com/commerce/products/3234743803219309/"
            style="text-align: right">
                <img id="ad_001_img" src="/ad_banners/C-300x250.png">
            </a>
        </div>
    </section>
</aside>