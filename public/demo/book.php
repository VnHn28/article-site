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
                        <header class="book-header">
                            <div class="book-header-cover">
                                <img src="img/tmp/demo07.png" alt="">
                            </div>
                            <div class="book-header-data">
                                <h1 class="book-header-title">成功率95%的雪球魔法：楊美娟教你冠軍人生與事業該知道的事</h1>
                                <dl class="book-header-info">
                                    <dt>作者：</dt>
                                    <dd>楊美娟</dd>
                                    <dt>出版社：</dt>
                                    <dd><a href="" target="_blank">商業周刊</a></dd>
                                    <dt>出版日期：</dt>
                                    <dd>2014/08/06</dd>
                                    <dt>語言：</dt>
                                    <dd>繁體中文</dd>
                                    <dt>何處購買：</dt>
                                    <dd class="fixed-width">
                                        <ul>
                                            <li><a href="" target="_blank">博客來</a></li>
                                            <li><a href="" target="_blank">誠品書局</a></li>
                                            <li><a href="" target="_blank">金石堂網路書店</a></li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </header>
                        <div class="recommend-person-sm fixed">
                            <div class="art-item-avatar cover" style="background-image: url('img/tmp/demo06.png');"></div>
                            <div class="recommend-person-intro">
                                <small>推薦人</small>
                                <br>
                                <span>盧俐靜</span>
                            </div>
                        </div>
                        <main class="article-editor">
                            <p>在中華兩岸EMBA聯合會認識了美娟學姊，在她溫柔有力的領導下，我所參與中的秘書處完成了很多不可能的任務，也讓我對於美娟學姊在保險業界的成功之道及領導風格很好奇，因此默默買了這本書閱讀，意外又吸收到了不少 !</p>
                            <p>原以為這是一本「如何做好頂尖業務」的教學書，但其實美娟學姊傳授的是＜成功的心法＞，分享的其實是她如何從學習、人脈、領導、視野、服務、公益來過好她的人生～非常值得細細品味！此書非常推薦給從事業務工作或管理階層的朋友～</p>
                            <br>
                            <br>
                            <p>最讓我銘記在心的是以下幾句 :<br><span style="color: #4990E2; font-size: 24;">在挫折中累積真正的實力，用人脈經營中成就事業，在擴大視野中提升格局</span></p>
                        </main>
                        <section class="article-bottom">
                            <div class="article-bottom-section article-bottom-info author-data">
                                <a class="author-avatar" style="background-image: url('img/tmp/demo06.png');" href="writer.php"></a>
                                <div class="author-content">
                                    <h6 class="author-name"><a href="writer.php">盧俐靜</a></h6>
                                    <div class="author-meta">凱斯整合行銷有限公司 業務總監</div>
                                    <div class="author-intro">自行創業成立凱斯整合行銷公司已7~8年，累積十一年網站規劃及建置經驗，目前公司提供網頁製作、口碑行銷、部落客行銷、FB行銷、數位媒體採購等全方位行銷服務。</div>
                                </div>
                            </div>
                            <?php include_once 'incl/shares.php'; ?>
                        </section>
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
    </body>
</html>