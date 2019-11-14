<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>今日吃瓜后台管理系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('img/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('manager/lib/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('manager/stylesheets/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('manager/lib/font-awesome/css/font-awesome.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('manager/js/manager.js') }}" type="text/javascript"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ URL::asset('manager/assets/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('manager/assets/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('manager/assets/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('manager/assets/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('manager/assets/ico/apple-touch-icon-57-precomposed.png') }}">
</head>

<!--[if lt IE 7 ]>
<body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>
<body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]>
<body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]>
<body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
<!--<![endif]-->

<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i> 超级管理员
                    <i class="icon-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">My Account</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="/admin/logout">退出</a></li>
                </ul>
            </li>
        </ul>
        <a class="brand" href="/admin" style="color: white">今日吃瓜后台管理系统</a>
    </div>
</div>

<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>热搜</a>
    <ul id="dashboard-menu" class="nav nav-list collapse @if(in_array($_SERVER['REQUEST_URI'], ['/admin', '/admin/hot_search_add'])) in @endif">
        <li @if($_SERVER['REQUEST_URI'] == '/admin') class="active" @endif><a href="{{ url('/admin') }}">列表</a></li>
        <li @if($_SERVER['REQUEST_URI'] == '/admin/hot_search_add') class="active" @endif><a href="{{ url('/admin/hot_search_add') }}">添加</a></li>
    </ul>

    {{--<a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-comment"></i>意见反馈</a>
    <ul id="legal-menu" class="nav nav-list collapse">
        <li><a href="/admin/feedback_list/">列表</a></li>
        <li><a href="/admin/recycle_bin/">回收站</a></li>
    </ul>--}}

    {{--<a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-legal"></i>网站公告</a>
    <ul id="error-menu" class="nav nav-list collapse">
        <li><a href="/admin/news_list/">列表</a></li>
        <li><a href="/admin/news_add/">添加</a></li>
    </ul>--}}
</div>

<div class="content">
    <div class="header">
        <div class="stats">
            <p class="stat"><span class="number">{{ date('d') }}</span>日</p>
            <p class="stat"><span class="number">{{ date('m') }}</span>月</p>
            <p class="stat"><span class="number">{{ date('Y') }}</span>年</p>
        </div>
        <h1 class="page-title">@yield('theme')</h1>
    </div>
    @yield('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <footer>
                <hr>
                <p class="pull-right">Collect from <a href="http://www.jinrichigua.com/" title="深圳网信网络科技有限公司" target="_blank">深圳网信网络科技有限公司</a></p>
                <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
            </footer>
        </div>
    </div>
</div>

<script src="{{ URL::asset('manager/lib/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function () {
        $('.demo-cancel-click').click(function () {
            return false;
        });
    });
</script>
</body>
</html>


