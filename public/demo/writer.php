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
                        <header class="author-header">
                            <div class="author-header-avatar cover" style="background-image: url();"></div>
                            <div class="author-header-content">
                                <h3 class="author-header-name">盧俐靜</h3>
                                <div class="author-header-meta">凱斯整合行銷有限公司 業務總監</div>
                                <p class="author-header-intro">自行創業成立凱斯整合行銷公司已7~8年，累積十一年網站規劃及建置經驗，目前公司提供網頁製作、口碑行銷、部落客行銷、FB行銷、數位媒體採購等全方位行銷服務。</p>
                            </div>
                        </header>
                        <main class="author-portfolio">
                            <h2 class="author-portfolio-title">盧俐靜 的文章</h2>
                            <div class="f-row">
                                <?php
                                $arr = array('專欄分享', '選書');

                                for ($i = 0; $i < 12; $i++) {
                                ?>
                                <div class="art-item f-col-12 f-col-sm-6 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url();" href="article.php"></a>
                                    <div class="art-item-content">
                                        <div class="art-item-meta">
                                            <span class="meta"><?=$arr[$i%2];?></span>
                                            <span class="meta">2017-02-18</span>
                                        </div>
                                        <h3 class="art-item-title">
                                            <a href="article.php">伊隆・馬斯克眼中的人類未來：基本收入、生化人、自動駕駛和地下城</a>
                                        </h3>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <ul class="pagi">
                                <li class="pagi-item"><span class="pagi-text">«</span></li>
                                <li class="pagi-item active"><a class="pagi-link">1</a></li>
                                <li class="pagi-item"><a class="pagi-link">2</a></li>
                                <li class="pagi-item"><a class="pagi-link">3</a></li>
                                <li class="pagi-item"><span class="pagi-text">…</span></li>
                                <li class="pagi-item"><a class="pagi-link">10</a></li>
                                <li class="pagi-item"><a class="pagi-link">»</a></li>
                            </ul>
                        </main>
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="<?=$full_url;?>" data-numposts="2" data-width="100%" data-mobile="true"></div>

                            <div class="pager">
                                <a class="pager-link pager-list" href="articles.php">回作家列表</a>
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