<!DOCTYPE html>
<html lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @include('incl/meta')
        @include('incl/settings')
    </head>
    <body>
        <div id="wrap">
            @include('incl/header')
            <main id="main" class="l-container">
                <div class="cat-menu-wrap">
                    <nav class="cat-menu">
                        <a class="cat-menu-link @if($category_id == 0) active @endif " href="/stores">所有選店</a>
                        @foreach ($categorys as $value)
                            <a class="cat-menu-link @if($value->id == $category_id) active @endif " href="/stores/{{$value->name}}">{{$value->name}}</a>
                        @endforeach
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href='/stores/' + this.value">
                        <option @if($category_id == 0) active @endif " value="">所有選店</option>
                        @foreach ($categorys as $value)
                            <option value="{{$value->id}}" @if($value->id == $category_id) selected @endif >{{$value->name}}</option>
                        @endforeach
                    </select>
                    <h2 class="cat-menu-title">@if($category_id == 0) 所有選店 @else {{$categorys->find($category_id)->name}} @endif</h2>
                </div>
                <div class="f-row hasArticlesItem">
                    @foreach($stores as $i => $store)
                    <?php
                    // for ($i = 0; $i < 15; $i++) {
                        $col = ($i == 0) ? ' f-col-12 f-col-md-6' : ' f-col-12 f-col-sm-6 f-col-md-3';
                        $sz = ($i == 0) ? ' sz-md' : '';
                    ?>
                    <div class="art-item<?=$sz . $col;?>">
                        <a class="art-item-cover cover" style="background-image: url(/{{$store->cover_image}});" href="/store/{{$store->id}}"></a>
                        <div class="art-item-content">
                            <div class="art-item-meta">
                                <span class="meta">{{$store->category_name}}</span>
                            </div>
                            <h3 class="art-item-title">
                                <a href="/store/{{$store->id}}">{{$store->title}}</a>
                            </h3>
                            <p class="art-item-intro">{{$store->subtitle}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if(0)
                <ul class="pagi">
                    <li class="pagi-item"><span class="pagi-text">«</span></li>
                    <li class="pagi-item active"><a class="pagi-link">1</a></li>
                    <li class="pagi-item"><a class="pagi-link">2</a></li>
                    <li class="pagi-item"><a class="pagi-link">3</a></li>
                    <li class="pagi-item"><span class="pagi-text">…</span></li>
                    <li class="pagi-item"><a class="pagi-link">10</a></li>
                    <li class="pagi-item"><a class="pagi-link">»</a></li>
                </ul>
                @endif
                <div class="cat-menu-bottom">
                    <nav class="cat-menu">
                        <a class="cat-menu-link @if($category_id == 0) active @endif " href="/stores">所有選店</a>
                        @foreach ($categorys as $value)
                            <a class="cat-menu-link @if($value->id == $category_id) active @endif " href="/stores/{{$value->name}}">{{$value->name}}</a>
                        @endforeach
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href=this.value">
                        @foreach ($categorys as $value)
                            <option value=""  @if($value->id == $category_id) selected @endif >{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>