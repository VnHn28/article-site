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
                        <a class="cat-menu-link @if($group_category_id == 0) active @endif " href="/groups">@lang('groups.all_groups')</a>
                        @foreach ($categorys as $value)
                            <a class="cat-menu-link @if($group_category_id == $value->id) active @endif " href="/groups/{{$value->name}}">{{$value->name}}</a>
                        @endforeach
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href='/groups/'+this.value">
                        <option @if($group_category_id == 0) active @endif " value="">@lang('groups.all_groups')</option>
                        @foreach ($categorys as $value)
                            <option value="{{$value->id}}"@if($group_category_id == $value->id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                    <h2 class="cat-menu-title">@if($group_category_id == 0) @lang('groups.all_groups') @else {{$categorys->find($group_category_id)->name}} @endif</h2>
                </div>
                <div class="f-row hasGroupsItem">
                    @foreach($groups as $key => $group)
                        @if($key == 0)
                        <!-- 大版位 19開始-->
                        <div class="art-item sz-lg f-col-12">
                            <a class="art-item-cover cover sz-md" style="background-image: url(/{{$group->cover_image}});" href="/group/{{$group->id}}">
                                <span class="tag" style="background-color: {{$group->list_color}};">{{$group->article_category_name}}</span>
                            </a>
                            <div class="art-item-content sz-md">
                                <div class="art-item-meta">
                                    <span class="meta">{{$group->name}}</span>|
                                    <span class="meta">{{$group->memberName}}</span>
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/group/{{$group->id}}">{{$group->title}}</a>
                                </h3>
                                <p class="art-item-intro">{{$group->subtitle}}</p>
                            </div>
                        </div>
                        <!-- 大版位 結束 -->
                        @else
                        <!-- 18開始-->
                        <div class="art-item f-col-12 f-col-sm-6 f-col-md-4">
                            <a class="art-item-cover cover art-item-cover-tag" style="background-image: url(/{{$group->cover_image}});" href="/group/{{$group->id}}">
                                <span class="tag" style="background-color: {{$group->list_color}};">{{$group->article_category_name}}</span>
                            </a>
                            <div class="art-item-content sz-md">
                                <div class="art-item-meta">
                                    <span class="meta">{{$group->name}}</span>|
                                    <span class="meta">{{$group->memberName}}</span>
                                </div>
                                <h3 class="art-item-title">
                                    <a href="/group/{{$group->id}}">{{$group->title}}</a>
                                </h3>
                                <p class="art-item-intro" style="font-size:14px;line-height:22px;">{{$group->subtitle}}</p>
                            </div>
                        </div>
                        <!-- 結束 -->
                        @endif
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
                        <a class="cat-menu-link @if($group_category_id == 0) active @endif " href="/groups">@lang('groups.all_groups')</a>
                        @foreach ($categorys as $value)
                            <a class="cat-menu-link @if($group_category_id == $value->id) active @endif " href="/groups/{{$value->name}}">{{$value->name}}</a>
                        @endforeach
                    </nav>
                    <select class="cat-menu-select" onchange="window.location.href='/groups/'+this.value">
                        <option @if($group_category_id == 0) active @endif " value="">@lang('groups.all_groups')</option>
                        @foreach ($categorys as $value)
                            <option value="{{$value->id}}"@if($group_category_id == $value->id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>