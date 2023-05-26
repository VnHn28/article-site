<div id="footer">
    <div class="sitemap">
        <nav class="section">
            <h6 class="sitemap-title">文章</h6>
            <a class="sitemap-link" href="/">最新文章</a>
            <a class="sitemap-link" href="/articles.php">專欄分享</a>
            <a class="sitemap-link" href="/events.php">活動快訊</a>
            <a class="sitemap-link" href="/books.php">選書</a>
            <a class="sitemap-link" href="/stores.php">選店</a>
        </nav>
        <nav class="section">
            <h6 class="sitemap-title">關於</h6>
            <a class="sitemap-link" href="/about_channel.php">關於 Channel</a>
            <a class="sitemap-link" href="/ads.php">廣告合作</a>
            <a class="sitemap-link" href="/writers.php">作家介紹</a>
            <a class="sitemap-link" href="/submit.php">我要投稿</a>
        </nav>
        <nav class="section">
            <h6 class="sitemap-title">Circles</h6>
            <a class="sitemap-link" href="/about_circles.php">關於 Circles</a>
            <a class="sitemap-link" href="/contact.php">聯絡我們</a>
            <a class="sitemap-link" href="/join.php">申請加入</a>
            <a class="sitemap-link" href="https://circles.tw/apps">APP 下載</a>
        </nav>
        <nav class="section">
            <h6 class="sitemap-title">權益</h6>
            <a class="sitemap-link" href="/terms.php">使用條款</a>
            <a class="sitemap-link" href="/privacy.php">隱私權條款</a>
            <a class="sitemap-link" href="/cookie.php">Cookie</a>
        </nav>
        <select class="sitemap-select" onchange="window.location.href=this.value">
            <optgroup label="文章">
                <option value="/">最新文章</option>
                <option value="/articles.php">專欄分享</option>
                <option value="/events.php">活動快訊</option>
                <option value="/books.php">選書</option>
                <option value="/stores.php">選店</option>
            </optgroup>
            <optgroup label="關於">
                <option value="/about_channel.php">關於 Channel</option>
                <option value="/ads.php">廣告合作</option>
                <option value="/writers.php">作家介紹</option>
                <option value="/submit.php">我要投稿</option>
            </optgroup>
            <optgroup label="Circles">
                <option value="/about_circles.php">關於 Circles</option>
                <option value="/contact.php">聯絡我們</option>
                <option value="/join.php">申請加入</option>
                <option value="https://circles.tw/apps">APP 下載</option>
            </optgroup>
            <optgroup label="權益">
                <option value="/terms.php">使用條款</option>
                <option value="/privacy.php">隱私權條款</option>
                <option value="/cookie.php">Cookie</option>
            </optgroup>
        </select>
        <div class="shares">
            <span>我要分享：</span>
            <a class="share-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$full_url;?>&t=<?=$title;?>" title="分享到 Facebook">
                <i class="icon-facebook" aria-hidden="true"></i>
            </a>
            <a class="share-item" target="_blank" href="https://twitter.com/intent/tweet?source=<?=$full_url;?>&text=<?=$title;?>:<?=$full_url;?>" title="分享到 Twitter">
                <i class="icon-twitter" aria-hidden="true"></i>
            </a>
            <a class="share-item js-share-line" target="_blank" data-title="<?=$title;?>" data-url="<?=$full_url;?>" title="分享到 Line">
                <i class="icon-line" aria-hidden="true"></i>
            </a>
            <a class="share-item" href="mailto:?subject=<?=$title;?>&body=<?=$description;?> <?=$full_url;?>" title="用 Email 分享給朋友">
                <i class="icon-envelope" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div id="copyright">&copy; 2017 KS-Design Inc.</div>
</div>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/magz.min.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>