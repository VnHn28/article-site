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
                <div class="cat-section">
                    <div class="f-row hasLargeItem">
                        <?php
                        for ($i = 0; $i < 8; $i++) {
                            $col = ($i == 0) ? ' f-col-12' : (($i == 1) ? ' f-col-12 f-col-md-6' : ' f-col-12 f-col-sm-6 f-col-md-3');
                            $sz = ($i == 0) ? ' sz-lg' : (($i == 1) ? ' sz-md' : '');
                        ?>
                        <div class="art-item<?=$sz . $col;?>">
                            <a class="art-item-cover cover" style="background-image: url();" href="article.php"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">分類名稱</span>
                                    <span class="meta">2017-02-18</span>
                                </div>
                                <h3 class="art-item-title">
                                    <a href="article.php">伊隆・馬斯克眼中的人類未來：基本收入、生化人、自動駕駛和地下城</a>
                                </h3>
                                <p class="art-item-intro">太空探索技術公司 SpaceX 和特斯拉電動汽車公司 CEO 伊隆 · 馬斯克（Elon Musk）近日在杜拜出席了世界政府首腦會議（World Government Summit），並上台做了演講。這位億萬富翁表達了他對人工智慧、全民基本收入和人類未來等的看法。</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="cat-section">
                    <h2 class="cat-section-title">近期活動</h2>
                    <div class="f-row onlySmallItem">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                        <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                            <a class="art-item-cover cover" style="background-image: url();" href="event.php"></a>
                            <div class="art-item-content">
                                <h3 class="art-item-title">
                                    <a href="event.php">品酒迎新春</a>
                                </h3>
                                <div class="evt-item-meta">
                                    <div class="meta">主辦單位：謙和商務聯誼會</div>
                                    <div class="meta">活動日期：2017/02/21 <span class="week">星期二</span></div>
                                </div>
                                <p class="art-item-intro">本次活動正是開啟全新一年的第一彈春酒活動，歡迎邀請親友及伙伴們一同來開運喔！</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="cat-section">
                    <h2 class="cat-section-title">Circles 選書</h2>
                    <div class="f-row onlySmallItem">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
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
                </div>
                <div class="cat-section hasMediumItem">
                    <h2 class="cat-section-title">Circles 選店</h2>
                    <div class="f-row">
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                            $col = ($i == 0) ? ' f-col-12 f-col-md-6' : ' f-col-12 f-col-sm-6 f-col-md-3';
                            $sz = ($i == 0) ? ' sz-md' : '';
                        ?>
                        <div class="art-item<?=$sz . $col;?>">
                            <a class="art-item-cover cover" style="background-image: url();" href="store.php"></a>
                            <div class="art-item-content">
                                <div class="art-item-meta">
                                    <span class="meta">分類名稱</span>
                                </div>
                                <h3 class="art-item-title">
                                    <a href="store.php">稻舍URS329</a>
                                </h3>
                                <p class="art-item-intro">「邊境」通常給人印象為不確定、冒險、未知的情感，我們認為在創新的過程就像是身處於未知的邊境，有很多的可能性存在。另外「跨越自身經驗的邊境就是世界」，我們相信這跨越舒適圈的想法，更是呼應共創空間的精神。</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
        <?php include_once 'incl/footer.php'; ?>
    </body>
</html>