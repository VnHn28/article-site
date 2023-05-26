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