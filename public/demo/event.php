<!DOCTYPE html>
<html lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <?php
        include_once 'incl/meta.php';
        include_once 'incl/settings.php';
        ?>
    </head>
    <body>
        <div id="wrap">
            <?php include_once 'incl/header.php'; ?>
            <main id="main" class="l-container">
                <div class="f-row">
                    <article class="article-body f-col-12 f-col-md-8">
                        <header class="event-section event-header">
                            <div class="event-header-cover cover" style="background-image: url();"></div>
                            <h1 class="event-header-title">2016中華兩岸EMBA論壇+企業博覽會</h1>
                            <ul class="event-header-meta">
                                <li>主辦單位：中華兩岸EMBA聯合會</li>
                                <li>報名日期：2016-11-23 至 2016-11-26</li>
                                <li>相關網址：<a href="http://www.csu-emba.com/" target="_blank">http://www.csu-emba.com/</a></li>
                                <li>報名網址：<a href="https://www.circles.tw/events/public/94" target="_blank">https://www.circles.tw/events/public/94</a></li>
                            </ul>
                        </header>
                        <section class="event-section event-data">
                            <div class="event-data-content">
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-user-circle" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        活動聯絡人：Circles 小秘書<br />
                                        feedback@circles.tw
                                    </dd>
                                </dl>
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-map-marker" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        中油大樓 國光會議廳<br />
                                        台北市信義區松仁路3號
                                    </dd>
                                </dl>
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-calendar" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        2016/11/27 09:00 - 17:30<br />
                                        <a href="">新增到 Google 行事曆</a>
                                    </dd>
                                </dl>
                            </div>
                            <div class="article-map">
                                <div id="map_canvas" class="googlemap"></div>
                            </div>
                        </section>
                        <section class="event-section event-description">
                            <h2>活動說明</h2>
                            <div class="article-editor">
                                <p>中華兩岸EMBA聯合會是台灣EMBA第一個立案的社團法人，感謝有您及各校EMBA學長姐的支持，從體制建構邁入多元發展，我們致力於營造一個兩岸EMBA學術、企業交流的優質平台。</p>
                                <p>本會將於11/27(日)隆重舉辦『第一屆中華兩岸EMBA論壇』，這也是第一個集合來自37所學校的會員所舉辦的論壇，期盼通過大家共同的努力，讓CSU能成為EMBA畢業生的領導品牌！誠摯邀請您一起來共襄盛舉，相互交流！</p>
                                <p>1127第一屆中華兩岸EMBA論壇線上報名連結<br /><a href="http://www.csu-emba.com/event/reg.html" target="_blank">http://www.csu-emba.com/event/reg.html</a></p>
                                <p>招商報名連結<br /><a href="http://www.csu-emba.com/event/exposition.html" target="_blank">http://www.csu-emba.com/event/exposition.html</a></p>
                            </div>
                        </section>
                        <section class="relations">
                            <h4 class="section-title">近期活動</h4>
                            <div class="f-row">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                ?>
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url();" href="event.php"></a>
                                    <div class="art-item-content">
                                        <h3 class="art-item-title">
                                            <a href="event.php">品酒迎新春</a>
                                        </h3>
                                        <div class="evt-item-meta">
                                            <div class="meta">主辦單位：謙和商務聯誼會</div>
                                            <div class="meta">活動日期：2017/02/21 星期二</div>
                                        </div>
                                        <p class="art-item-intro">本次活動正是開啟全新一年的第一彈春酒活動，歡迎邀請親友及伙伴們一同來開運喔！</p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="<?=$full_url;?>" data-numposts="2" data-width="100%" data-mobile="true"></div>

                            <div class="pager">
                                <a class="pager-link pager-prev" href="article.php">上一則</a>
                                <a class="pager-link pager-next" href="article.php">下一則</a>
                                <a class="pager-link pager-list" href="articles.php">回列表</a>
                            </div>
                        </footer>
                    </article>
                    <?php include_once 'incl/side.php'; ?>
                </div>
            </main>
        </div>
        <?php include_once 'incl/footer.php'; ?>
        <script>
            $(function() {
                $.googleMap.run('map_canvas', '台北市信義區松仁路3號');
            });
        </script>
    </body>
</html>