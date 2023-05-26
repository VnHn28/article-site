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
                        <header class="article-header">
                            <div class="article-metas">
                                <span class="article-meta-item">分類名稱</span>
                                <span class="article-meta-item">2017-02-18</span>
                            </div>
                            <h1 class="article-title">BorderLabs｜邊境實驗室</h1>
                            <img class="article-cover" src="img/tmp/demo05.png">
                            <p class="article-lead">「邊境」通常給人印象為不確定、冒險、未知的情感，我們認為在創新的過程就像是身處於未知的邊境，有很多的可能性存在。另外「跨越自身經驗的邊境就是世界」，我們相信這跨越舒適圈的想法，更是呼應共創空間的精神。並將「海納百川，有容乃大」的意涵取其中文字體詮釋英文前後字母B跟R，置入海豚共生共好的習性及形象，創作了專屬於邊境的LOGO。</p>
                        </header>
                        <main class="article-editor">
                            <img src="img/tmp/demo03.png" alt="" />
                            <p>「BorderLabs｜邊境實驗室」座落於大稻埕，其風土民情及溫暖的人文特質伴隨著繁榮歷史延續至今，於人於土都留下了別緻細膩的氣質。這裡不只擁有共同工作的空間、活動場地及辦公室物資，更蘊含豐沛的集體創造力。</p>
                            <img src="img/tmp/demo04.png">
                            <p>我們關注創新及設計相關議題，致力串聯資源、促進更多跨領域合作的機會完成不同形式的專案。邊境的每位傑出工作者都能彼此交流、分享自身專業上的知識，以不同的眼光發現存在大環境裡各種待處理的議題、腦力激盪、討論解決方案，一起創造並實踐更多可能性，延伸共同工作的新價值－共同創造。</p>
                        </main>
                        <section class="article-map">
                            <div id="map_canvas" class="googlemap"></div>
                        </section>
                        <section class="article-bottom">
                            <div class="article-bottom-section article-bottom-info store-data">
                                <h4 class="store-data-name">BorderLabs｜邊境實驗室</h4>
                                <dl class="store-data-info">
                                    <dt>商家類型：</dt>
                                    <dd>共同工作空間</dd>
                                    <dt>商家地址：</dt>
                                    <dd>
                                        <a href="http://maps.google.com/?q=台北市大同區安西街126號" target="_blank">
                                            台北市大同區安西街126號
                                            <i class="icon-map" aria-hidden="true"></i>
                                        </a>
                                    </dd>
                                    <dt>聯絡電話：</dt>
                                    <dd>02-1234-5678</dd>
                                    <dt>開放時間： </dt>
                                    <dd class="pre">星期四 09:30–21:30
星期五 09:30–21:30
星期六 休息
星期日 休息
星期一 09:30–21:30
星期二 09:30–21:30
星期三 09:30–21:30</dd>
                                    <dt>其他備註：</dt>
                                    <dd class="pre"></dd>
                                </dl>
                            </div>
                            <?php include_once 'incl/shares.php'; ?>
                        </section>
                        <section class="relations">
                            <h4 class="section-title">更多選店</h4>
                            <div class="f-row">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                ?>
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url();" href="article.php"></a>
                                    <div class="art-item-content">
                                        <div class="art-item-meta">
                                            <span class="meta">2017-02-18</span>
                                        </div>
                                        <h3 class="art-item-title">
                                            <a href="article.php">花花煮婦 配好菜</a>
                                        </h3>
                                        <p class="art-item-intro">花花煮婦配好菜是為了讓許多沒時間準備食材的人也能下廚，幫助大家找回烹煮的樂趣，也對於吃進口中的食物更有安全的感受而誕生的。上百種豐富菜色、中式、日式、西式，讓每天餐桌上都是趟不同的旅行。</p>
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
                $.googleMap.run('map_canvas', '台北市大同區安西街126號');
            });
        </script>
    </body>
</html>