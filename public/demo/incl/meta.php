<?php
$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
$full_url = $base_url . $_SERVER["REQUEST_URI"];

$title = "Channel";
$description = "description";
$cover = "";
?>

<meta http-equiv="Content-Type" charset="utf-8">
<meta http-equiv="Content-Language" content="zh-TW">
<meta name="robots" content="all" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="<?=$description;?>" />
<meta name="keywords" content="" />
<title>Magz</title>
<link rel="Shortcut icon" href="http://www.kule.tw/img/avatar.png" />
<link rel="Bookmark" href="http://www.kule.tw/img/avatar.png" />

<!--Facebook Meta Start-->
<meta property="og:title" content="<?=$title;?>">
<meta property="og:type" content="Website">
<meta property="og:url" content="<?=$full_url;?>">
<meta property="og:image" content="<?=$cover;?>">
<meta property="og:site_name" content="Channel">
<meta property="og:description" content="<?=$description;?>">
<!--Facebook Meta End-->