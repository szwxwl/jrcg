<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')今日吃瓜</title>
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/font/iconfont.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/css/common.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/css/index.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/css/serach.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/css/details.css') }}"/>
    <script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="http://img11.tongzhuo100.com/js/jquery.nicescroll.min.js" type="text/javascript"></script><!--美化滚动条-->
    <script src="{{ URL::asset('web/js/comm.js') }}" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="hoTop">
    <div class="hotcon clearfix">
        <div class="hoTop_L">
            <a href="/" class="logo">
                <img src="{{ asset('img/logo.png') }}"/>
                <span>今日吃瓜</span>
            </a>
            <span class="toplist">
                <a href="/" class="@if($_SERVER['REQUEST_URI'] == '/') cur @endif fonthover" >首页</a>
                {{--<a href="/" @if(strstr(urldecode($_SERVER['REQUEST_URI']), '订阅') !== false) class="cur" @endif>订阅</a>--}}
                @foreach($level_list as $level)
                    <a href="{{ url('/level', ['level' => $level]) }}" class="@if(strstr(urldecode($_SERVER['REQUEST_URI']), $level) !== false) cur @endif fonthover" >{{ $level }}</a>
                @endforeach
            </span>
        </div>
        <div class="hoTop_M">
            <span id="loupe" class="iconfont iconfangdajing fonthover"></span>
            <form method="get" action="{{ url('search') }}" class="comserach">
                <span class="iconfont iconguanbi" id="close"></span>
                <input type="text" name="node_name" placeholder="搜索内容和节点"/>
                <button type="submit" class="iconfont iconfangdajing"></button>
            </form>
        </div>
        <div class="hoTop_R">
        </div>
    </div>
</div>
@yield('content')
<div class="footer">
    <div class="footercon">
        <p>
            <a href="/about">关于我们</a>
            <a href="/feedback" target="_blank">意见反馈</a>
        </p>
        <p>Copyright © www.jinrichigua.com, All Rights Reserved. 各站热点聚合</p>
    </div>
</div>
<div class="iconfont iconxiangshang" id="footup"></div>
@yield('bottom')