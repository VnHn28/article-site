<meta http-equiv="Content-Type" charset="utf-8">
<meta http-equiv="Content-Language" content="zh-TW">
<meta name="robots" content="all" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="<?php echo ($description) ? strip_tags( $description ) : CRUDBooster::getSetting('meta_description') ?>" />
<meta name="keywords" content="{{$keywords?$keywords : CRUDBooster::getSetting('meta_keywords')}}" />
<title>{{$title or ''}} CiRCLELiNKS Channel</title>
<link rel="Shortcut icon" href="{{env('APP_URL')}}/{{$cover_image or 'img/favicon.png'}}" />
<link rel="Bookmark" href="{{env('APP_URL')}}/{{$cover_image or 'img/favicon.png'}}" />

<!--Facebook Meta Start-->
<meta property="og:title" content="{{$title? $title : CRUDBooster::getSetting('meta_ogtitle')}}">
<meta property="og:type" content="Website">
<meta property="og:url" content="{{Request::url()}}">
<meta property="og:image" content="{{env('APP_URL')}}/{{$cover_image or 'img/Channel_ogImage.jpg'}}">
<meta property="og:site_name" content="{{$title or ''}} CiRCLELiNKS Channel">
<meta property="og:description" content="<?php echo ($description) ? strip_tags( $description ) : CRUDBooster::getSetting('meta_ogdescription') ?>">
<!--Facebook Meta End-->

