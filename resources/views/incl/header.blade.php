<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZLFSG9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $logo = CRUDBooster::getSetting('logo'); ?>
<header id="header">
    <a class="header-brand" href="/" style="background:url('/{{$logo}}') center no-repeat transparent;"></a>
    <a class="header-menu-switch"></a>
    <div class="header_menu_wrap">
        <nav class="header-menu">
            <a class="header-menu-item @if( preg_match('/articles/', request()->route()->getName()) ) active @endif " href="/articles">專欄</a>
            <a class="header-menu-item @if( preg_match('/groups/', request()->route()->getName()) ) active @endif " href="/groups">團體</a>
            <a class="header-menu-item @if( preg_match('/events/', request()->route()->getName()) ) active @endif " href="/events">活動</a>
            <a class="header-menu-item @if( preg_match('/books/', request()->route()->getName()) ) active @endif " href="/books">選書</a>
            <a class="header-menu-item @if( preg_match('/stores/', request()->route()->getName()) ) active @endif " href="/stores">選店</a>
            <a class="header-menu-item @if( preg_match('/writers/', request()->route()->getName()) ) active @endif " href="/writers">之友</a>
            <a class="header-menu-item lang_select" target="_blank" href="https://news.yahoo.com"> Global Site</a>
        </nav>
    </div>
</header>