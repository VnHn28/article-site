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
                <div class="f-row f-align-center">
                    <div class="f-col-12 f-col-sm-9">
                        <h2 class="static-title">我要投稿</h2>
                        <article class="article-editor">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam magnam, fuga nisi quasi consequuntur aliquid debitis odio asperiores! Iure ex maiores sit porro, tempore necessitatibus. Nesciunt consequatur ipsam, nisi architecto.</p>
                        </article>
                        <div class="paper">
                            <form>
                                <div class="ctrl-grp">
                                    <label class="ctrl-label">聯絡人姓名</label>
                                    <div class="ctrls">
                                        <input type="text" class="ctrl-input" />
                                    </div>
                                </div>
                                <div class="ctrl-grp">
                                    <label class="ctrl-label">聯絡電話</label>
                                    <div class="ctrls">
                                        <input type="tel" class="ctrl-input" />
                                    </div>
                                </div>
                                <div class="ctrl-grp">
                                    <label class="ctrl-label">電子郵件</label>
                                    <div class="ctrls">
                                        <input type="email" class="ctrl-input" />
                                    </div>
                                </div>
                                <div class="ctrl-grp">
                                    <label class="ctrl-label">留言 / 備註</label>
                                    <div class="ctrls">
                                        <textarea class="ctrl-input"></textarea>
                                    </div>
                                </div>
                                <div class="ctrl-grp">
                                    <div class="ctrls">
                                        <input type="submit" class="btn" value="送出">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        @include('incl/footer')
    </body>
</html>