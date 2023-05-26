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
                <?php $cats = array('所有選店', '分類名稱', '分類名稱', '分類名稱', '分類名稱', '分類名稱', '分類名稱');?>
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
                    <h2 class="cat-menu-title">所有選店</h2>
                </div>
                <div class="f-row hasMediumItem">
                    <?php
                    for ($i = 0; $i < 15; $i++) {
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
                            <p class="art-item-intro">「邊境」通常給人印象為不確定、冒險、未知的情感，我們認為在創新的過程就像是身處於未知的邊境，有很多的可能性存在。</p>
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