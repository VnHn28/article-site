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
                <div class="f-row">
                    <article class="article-body f-col-12 f-col-md-8">
                        <header class="author-header">
                            <div class="author-header-avatar cover" style="background-image: url(/{{$author->cover_image}});"></div>
                            <div class="author-header-content">
                                <h3 class="author-header-name">{{$author->name}}</h3>
                                <div class="author-header-meta">{!!$author->job_title!!}</div>
                                <p class="author-header-intro">{!!$author->intro!!}</p>
                            </div>
                        </header>
                        <main class="author-portfolio">
                            @if($articles->count())
                                <h2 class="author-portfolio-title">{{$author->name}} 的相關文章</h2>
                                <div class="f-row">
                                    @foreach($articles as $article)
                                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-4">
                                        <a class="art-item-cover cover" style="background-image: url(/{{$article->cover_image}});" href="/article/{{$article->id}}"></a>
                                        <div class="art-item-content">
                                            <div class="art-item-meta">
                                                <span class="meta">{{$article->category_name}}</span>
                                                <span class="meta">{{substr($article->create_at, 0, 10)}}</span>
                                            </div>
                                            <h3 class="art-item-title">
                                                <a href="/article/{{$article->id}}">{{$article->title}}</a>
                                            </h3>
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
                            @endif
                            @if($recommendationBooks->count())
                                <h2 class="author-portfolio-title">{{$author->name}} 的選書推薦</h2>
                                <div class="f-row">
                                    @foreach($recommendationBooks as $recommendationBook)
                                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-4">
                                        <a class="art-item-cover cover" style="padding-bottom: 150px; background-size:contain; background-image: url(/{{$recommendationBook->cover_image}});" href="/books/{{$recommendationBook->id}}"></a>
                                        <div class="art-item-content">
                                            <div class="art-item-meta">
                                                <span class="meta">{{substr($recommendationBook->create_at, 0, 10)}}</span>
                                            </div>
                                            <h3 class="art-item-title">
                                                <a href="/books/{{$recommendationBook->id}}">{{$recommendationBook->title}}</a>
                                            </h3>
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
                            @endif
                            @if($relatedGroups)
                                <h2 class="author-portfolio-title">{{$author->name}} 的團體文章</h2>
                                <div class="f-row">
                                    @foreach($relatedGroups as $relatedGroup)
                                    <div class="art-item f-col-12 f-col-sm-6 f-col-md-4">
                                        <a class="art-item-cover cover" style="background-image: url(/{{$relatedGroup->cover_image}});" href="/group/{{$relatedGroup->id}}">
                                            <span class="tag" style="background-color: {{$relatedGroup->list_color}};">{{$relatedGroup->article_category_name}}</span>
                                        </a>
                                        <div class="art-item-content">
                                            <div class="art-item-meta">
                                                <span class="meta">{{$relatedGroup->category_name}}</span>
                                                <span class="meta">{{substr($relatedGroup->create_at, 0, 10)}}</span>
                                            </div>
                                            <h3 class="art-item-title">
                                                <a href="/group/{{$relatedGroup->id}}">{{$relatedGroup->title}}</a>
                                            </h3>
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
                            @endif
                        </main>
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>
                            <div class="pager">
                                <a class="pager-link pager-list" href="/writers">回作家列表</a>
                            </div>
                        </footer>
                    </article>
                    @include('incl/side')
                </div>
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>