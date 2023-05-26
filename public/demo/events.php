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
                <div class="f-row onlySmallItem">
                    <?php
                    for ($i = 0; $i < 16; $i++) {
                    ?>
                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
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
        </div>
        <?php include_once 'incl/footer.php'; ?>
    </body>
</html>