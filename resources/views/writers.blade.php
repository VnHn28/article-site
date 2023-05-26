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
                <h2 class="cat-menu-title">Channel 人物介紹</h2>
                <div class="f-row hasMediumItem">
                    @foreach($authors as $author)
                    <div class="author-item f-col-8 f-col-offset-2 f-col-sm-4 f-col-sm-offset-1 f-col-md-3 f-col-md-offset-0">
                        <a class="author-item-cover cover" style="background-image: url({{$author->cover_image}});" href="/writers/{{$author->id}}"></a>
                        <div class="author-item-content">
                            <h3 class="author-item-name">
                                <a href="/writers/{{$author->id}}">{{$author->name}}</a>
                            </h3>
                            <p class="author-item-intro">{!!$author->company!!}</p>
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
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>