<div id="footer">
    <div class="sitemap">
        <nav class="section">
            <h6 class="sitemap-title">文章</h6>
            <a class="sitemap-link" href="/articles">專欄</a>
            <a class="sitemap-link" href="/group/group_list.php">團體</a>
            <a class="sitemap-link" href="/events">活動</a>
            <a class="sitemap-link" href="/books">選書</a>
            <a class="sitemap-link" href="/stores">選店</a>
        </nav>
        <nav class="section">
            <h6 class="sitemap-title">關於</h6>
            <a class="sitemap-link" href="/about_channel">關於 Channel</a>
            @if(0)<a class="sitemap-link" href="/ads">廣告合作</a>@endif
            <a class="sitemap-link" href="/writers">Channel之友</a>
            @if(0)<a class="sitemap-link" href="/submit">我要投稿</a>@endif
        </nav>
        <nav class="section">
            @if(0)<a class="sitemap-link" href="/join">申請加入</a>@endif
            @if(0)<a class="sitemap-link" href="https://www.google.com/helper">新手上路</a>@endif
            @if(0)<a class="sitemap-link" href="https://www.google.com/sitemap">網站地圖</a>@endif
            <h6 class="sitemap-title">CiRCLELiNKS</h6>
            <a class="sitemap-link" href="https://www.google.com/portal" target="_blank">關於 CiRCLELiNKS</a>
            <a class="sitemap-link" href="https://thailand-marketing.google.com/" target="_blank">泰國行銷加速器</a>
            <a class="sitemap-link" href="https://www.google.com/feedback" target="_blank">聯絡我們</a>
            <a class="sitemap-link" href="https://www.facebook.com/circlelinks.co.tw" target="_blank">FB粉絲團</a>
            <a class="sitemap-link" href="https://lin.ee/yZlwt2x" target="_blank">LINE客服</a>
            <a class="sitemap-link" href="https://google.com/apps"  target="_blank">APP 下載</a>
        </nav>
        <nav class="section">
            <h6 class="sitemap-title">權益</h6>
            <a class="sitemap-link" href="/terms">使用條款</a>
            <a class="sitemap-link" href="/privacy">隱私權條款</a>
            <a class="sitemap-link" href="/cookie">Cookie</a>
        </nav>
        <!-- 手機版選單 -->
        <div class="mobile-sitemap">    
            <h6>選擇其他頁面：</h6>
            <select class="sitemap-select" onchange="window.location.href=this.value">
                <optgroup label="文章">
                    <option value="/articles">專欄</option>
                    <option value="/group/group_list.php">團體</option>
                    <option value="/events">活動</option>
                    <option value="/books">選書</option>
                    <option value="/stores">選店</option>
                </optgroup>
                <optgroup label="關於">
                    <option value="/about_channel">關於 Channel</option>
                    @if(0)<option value="/ads">廣告合作</option>@endif
                    <option value="/writers">Channel之友</option>
                    @if(0)<option value="/submit">我要投稿</option>@endif
                </optgroup>
                <optgroup label="CiRCLELiNKS">
                    @if(0)<option value="/join">申請加入</option>@endif
                    <option value="https://www.google.com/portal">關於 CiRCLELiNKS</option>
                    <option value="https://thailand-marketing.google.com/">泰國行銷加速器</option>
                    <option value="/feedback">聯絡我們</option>
                    <option value="https://www.facebook.com/circlelinks.co.tw">FB粉絲團</option>
                    <option value="https://lin.ee/yZlwt2x">LINE客服</option>
                    <option value="https://google.com/apps">APP 下載</option>
                </optgroup>
                <optgroup label="權益">
                    <option value="/terms">使用條款</option>
                    <option value="/privacy">隱私權條款</option>
                    <option value="/cookie">Cookie</option>
                </optgroup>
            </select>
        </div>
        <div class="shares" style="padding-top:0px;">
            <div style="width: 220px; height: 60px; padding-top: 10px;">
                <a class="lang-btn"  href="https://channel-en.google.com/" target="_blank" style="padding-left: 40px; padding-right: 40px; margin-bottom: 10px;">Global Site</a>
            </div>
            <div style="width: 220px; height: 60px;">
                <a class="more-btn" href="https://www.google.com/" target="_blank" style="padding-left: 40px; padding-right: 40px; margin-bottom: 10px;">登入CiRCLELiNKS</a>
            </div>
            <span>我要分享：</span>
            <a class="share-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&t={{App::environment('APP_TITLE')}}" title="分享到 Facebook">
                <i class="icon-facebook" aria-hidden="true"></i>
            </a>
            <a class="share-item" target="_blank" href="https://twitter.com/intent/tweet?source={{Request::url()}}&text={{App::environment('APP_TITLE')}}:{{Request::url()}}" title="分享到 Twitter">
                <i class="icon-twitter" aria-hidden="true"></i>
            </a>
            <a class="share-item js-share-line" target="_blank" data-title="{{App::environment('APP_TITLE')}}" data-url="{{Request::url()}}" title="分享到 Line">
                <i class="icon-line" aria-hidden="true"></i>
            </a>
            <a class="share-item" href="mailto:?subject={{App::environment('APP_TITLE')}}&body={{App::environment('APP_DESCRIPTION')}} {{Request::url()}}" title="用 Email 分享給朋友">
                <i class="icon-envelope" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- <div id="copyright"> {{CRUDBooster::getSetting('Copyright')}} </div> -->
    <div id="copyright">&copy;2015-<span>2015</span> CiRCLELiNKS 智合圈</div>
</div>

<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/magz.min.js"></script>