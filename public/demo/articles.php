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
                <div class="cat-menu-wrap">
                    <?php $cats = array('所有文章', '人物專欄', '時事觀察', '創新工場', '財經評論', 'Circles 快報', '團體介紹'); ?>
                    <nav class="cat-menu">
                        <?php
                        foreach ($cats as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo "<a class=\"cat-menu-link . $active . \">" . $value . "</a>\n";
                        }
                        ?>
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href=this.value">
                        <?php
                        foreach ($cats as $key => $value) {
                            $selected = ($key == 0) ? 'selected' : '';
                            echo "<option value=\"\" $selected>" . $value . "</option>\n";
                        }
                        ?>
                    </select>
                    <h2 class="cat-menu-title">所有文章</h2>
                </div>
                <div class="f-row hasMediumItem">
                    <?php
                    for ($i = 0; $i < 15; $i++) {
                        $col = ($i == 0) ? ' f-col-12 f-col-md-6' : ' f-col-12 f-col-sm-6 f-col-md-3';
                        $sz = ($i == 0) ? ' sz-md' : '';
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
                <ul class="pagi">
                    <li class="pagi-item"><span class="pagi-text">«</span></li>
                    <li class="pagi-item active"><a class="pagi-link">1</a></li>
                    <li class="pagi-item"><a class="pagi-link">2</a></li>
                    <li class="pagi-item"><a class="pagi-link">3</a></li>
                    <li class="pagi-item"><span class="pagi-text">…</span></li>
                    <li class="pagi-item"><a class="pagi-link">10</a></li>
                    <li class="pagi-item"><a class="pagi-link">»</a></li>
                </ul>
                <div class="cat-menu-bottom">
                    <nav class="cat-menu">
                        <?php
                        foreach ($cats as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo "<a class=\"cat-menu-link . $active . \">" . $value . "</a>\n";
                        }
                        ?>
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href=this.value">
                        <?php
                        foreach ($cats as $key => $value) {
                            $selected = ($key == 0) ? 'selected' : '';
                            echo "<option value=\"\" $selected>" . $value . "</option>\n";
                        }
                        ?>
                    </select>
                </div>
            </main>
        </div>
        <?php include_once 'incl/footer.php'; ?>
    </body>
</html>