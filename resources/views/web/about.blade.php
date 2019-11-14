{{--引入布局--}}
@extends('web.common.layouts')
{{--引入布局--}}
<style>
    .about{max-width: 840px;color: #999;margin: 0 auto;background: #FFFFFF;border: 1px solid #DDDDDD;margin-top: 50px;padding: 30px 80px;}
    .about h2{text-align: center;margin-bottom: 30px;}
    .about .aboutcon{margin-bottom: 50px;}
    .about .aboutcon h3{margin-bottom: 15px;}
</style>
@section('content')
<div class="about">
    <h2>关于我们</h2>
    <div class="aboutcon">
        <h3>一、关于</h3>
        <p>1.今日热榜提供各站热点聚合:微信、今日头条、百度、知乎、V2EX、微博、贴吧、豆瓣、天涯、虎扑、Github、华尔街见闻...全网新闻热点排行榜服务。</p>
    </div>
    <div class="aboutcon">
        <h3>二、版权声明</h3>
        <p>1.　本站及 App 提供的信息资料、图片及视频等均来源于公开网络，本站仅提供基于类似搜索引擎类的推荐服务，所有详细信息均跳转到原始网页地址访问，如果侵犯您的权益
            ，请与我们联系,我们会尽快处理。同时请注意原网站的观点不表示我们也认同，信息内容真实性请自己辨别。</p>
    </div>
    <div class="aboutcon">
        <h3>三、官方网站</h3>
        <p><a href="http://jinrichigua.com">https://www.jinrichigua.com</a></p>
    </div>
    <div class="aboutcon">
        <h3>四、联系方式</h3>
        <p>1.　如果您对我们的 App 或内容建设，发展建议等相关任何问题，都欢迎随时和我们联系。在线反馈：吐个槽</p>
    </div>
</div>
@endsection
@section('bottom')
</body>
<script>
    $(".dot").click(function () {
        $(this).find(".doTip").toggle(50);
    })
    $(document).ready(
        function () {
            $(".artcon").niceScroll();
        }
    );
</script>
</html>
@endsection
