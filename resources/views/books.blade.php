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
                <div class="f-row hasMediumItem">
                    @foreach($books as $book)
                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-3">
                        <div class="bookcover-wrap">
                            <a class="art-item-bookcover cover" style="background-image: url(/{{$book->cover_image}});" href="/books/{{$book->id}}"></a>
                        </div>
                        <div class="art-item-content">
                            <h3 class="art-item-title">
                                <a href="/books/{{$book->id}}">{{$book->title}}</a>
                            </h3>
                            <div class="recommend-person-sm">
                                <div class="art-item-avatar cover" style="background-image: url(/{{$book->author_cover_image}});"></div>
                                <div class="recommend-person-intro">
                                    <small>推薦人</small>
                                    <br>
                                    <span>{{$book->author_name}}</span>
                                </div>
                            </div>
                            <div>
                                <a class="more-btn" href="/books/{{$book->id}}">立即閱讀</a>
                            </div>
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