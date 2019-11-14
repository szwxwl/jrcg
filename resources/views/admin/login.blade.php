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
    <!-- Demo page code -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
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
        <a class="brand" href="index.html" style="color: white">今日吃瓜后台管理系统</a>
    </div>
</div>
<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">今日吃瓜后台管理系统</p>
            <div class="block-body">
                <form method="post" action="{{ url('admin/login_action') }}">
                    @csrf
                    <label>账号</label>
                    <input type="text" name="user_name" class="span12" value="">
                    <label>密码</label>
                    <input type="password" name="pass_word" class="span12" value="">
                    <input type="submit" class="btn btn-primary pull-left" value="登录">
                    @if (isset($errors) && $errors->any())
                        <label class="label_error pull-right">{{ $errors->first() }}</label>
                    @endif
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="#" target="blank">联系我们</a></p>
        <p><a href="/">网站首页</a></p>
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
