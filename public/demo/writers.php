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
                <h2 class="cat-menu-title">Channel 作家</h2>
                <div class="f-row hasMediumItem">
                    <?php
                    for ($i = 0; $i < 20; $i++) {
                    ?>
                    <div class="author-item f-col-8 f-col-offset-2 f-col-sm-4 f-col-sm-offset-1 f-col-md-3 f-col-md-offset-0">
                        <a class="author-item-cover cover" style="background-image: url();" href="writer.php"></a>
                        <div class="author-item-content">
                            <h3 class="author-item-name">
                                <a href="writer.php">王筠琪</a>
                            </h3>
                            <p class="author-item-intro">默沏gallé 執行長</p>
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