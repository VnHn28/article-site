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
                        <header class="event-section event-header">
                            <div class="event-header-cover cover" style="background-image: url(/{{$tab_event->cover_image}});"></div>
                            <h1 class="event-header-title">{{$tab_event->title}}</h1>
                            <ul class="event-header-meta">
                                <li>主辦單位：{{$tab_event->organization_name}}</li>
                                <li>報名日期：{{substr($tab_event->reservation_begin,0,16)}} 至 {{substr($tab_event->reservation_end,0,16)}}</li>
                                <li>相關網址：<a href="{{$tab_event->related_url}}" target="_blank">{{$tab_event->related_url}}</a></li>
                                <!-- <li>報名網址：<a href="https://www.google.com/events/public/94" target="_blank">https://www.google.com/events/public/94</a></li> -->
                            </ul>
                        </header>
                        <section class="event-section event-data">
                            <div class="event-data-content">
                                @if(!empty($tab_event->contact_name) && !empty($tab_event->contact_email))
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-user-circle" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        @if(!empty($tab_event->contact_name))活動聯絡人：{{$tab_event->contact_name}}<br />@endif
                                        @if(!empty($tab_event->contact_email))<a href="mailto::{{$tab_event->contact_email}}">{{$tab_event->contact_email}}</a>@endif
                                    </dd>
                                </dl>
                                @endif
                                @if(!empty($tab_event->description) || !empty($tab_event->location))
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-map-marker" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        @if($tab_event->description)
                                        {{$tab_event->description}}<br />
                                        @endif
                                        @if($tab_event->location)
                                        {{$tab_event->location}}
                                        @endif
                                    </dd>
                                </dl>
                                @endif
                                <dl class="event-data-item">
                                    <dt>
                                        <i class="icon icon-calendar" aria-hidden="true"></i>
                                    </dt>
                                    <dd>
                                        {{substr($tab_event->event_begin_time,0,16)}} - {{substr($tab_event->event_end_time,0,16)}}<br />
                                        <a href="">新增到 Google 行事曆</a>
                                    </dd>
                                </dl>
                            </div>
                            @if(0)
                            <div class="article-map">
                                <div id="map_canvas" class="googlemap"></div>
                            </div>
                            @endif
                        </section>
                        <section class="event-section event-description">
                            <h2>活動說明</h2>
                            <div class="article-editor">
                                {!!$tab_event->content!!}
                            </div>
                        </section>
                        <section class="relations">
                            <h4 class="section-title">近期活動</h4>
                            <div class="f-row">
                                <?php
                                //for ($i = 0; $i < 3; $i++) {
                                ?>
                                @foreach($related_events as $related_event)
                                <div class="art-item f-col-12 f-col-sm-4 f-col-md-4">
                                    <a class="art-item-cover cover" style="background-image: url(/{{$related_event->cover_image}});" href="/events/{{$related_event->id}}"></a>
                                    <div class="art-item-content">
                                        <h3 class="art-item-title">
                                            <a href="/events/{{$related_event->id}}">{{$related_event->title}}</a>
                                        </h3>
                                        <div class="evt-item-meta">
                                            <div class="meta">主辦單位：{{$related_event->organization_name}}</div>
                                            <div class="meta">活動日期：{{substr($related_event->event_begin_time, 0, 10)}}</div>
                                        </div>
                                        <p class="art-item-intro">{{$related_event->subtitle}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <footer class="article-footer">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="2" data-width="100%" data-mobile="true"></div>

                            <div class="pager">
<!--                                 <a class="pager-link pager-prev" href="/event/prev">上一則</a>
                                <a class="pager-link pager-next" href="/event/next">下一則</a> -->
                                <a class="pager-link pager-list" href="/events">回列表</a>
                            </div>
                        </footer>
                    </article>
                    @include('incl/side')
                </div>
            </main>
        </div>
        @include('incl/footer')
        <script>
            $(function() {
                $.googleMap.run('map_canvas', '{{$tab_event->location}}');
            });
        </script>
    </body>
</html>