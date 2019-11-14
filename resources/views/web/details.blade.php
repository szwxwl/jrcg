{{--引入title--}}
@section('title', $hot_search['search_info']['title'] . ' ' . $hot_search['search_info']['hot_class'] . ' ')
{{--引入title--}}

{{--引入布局--}}
@extends('web.common.layouts')
{{--引入布局--}}
@section('content')
<div class="details">
    <p class="crumb">
        <a href="/">首页</a>/
        <a href="">{{ $hot_search['search_info']['title'] }}</a>
    </p>
    <div class="main">
        <div class="mainTop clearfix">
            <div class="topleft">
                <img src="{{ asset('storage/search_logo/' . $hot_search['search_info']['image']) }}"/>
                <div class="imgL">
                    <h2>{{ $hot_search['search_info']['title'] }}</h2>
                    <p>{{ $hot_search['search_info']['hot_class'] }}</p>
                    <a href="{{ url('/level', ['level' => $hot_search['search_info']['level']]) }}" class="pag">{{ $hot_search['search_info']['level'] }}</a>
                </div>
            </div>
            <div class="topright">
                <p>数据</p>
                <p>{{ count($hot_search['search']) }}条</p>
            </div>
        </div>
        <div class="mainMAX">
            <div class="mantab">
                <span>{{ $hot_search['search_info']['hot_class'] }}</span>
                {{--<span>历史数据</span>
                <span>相关节点</span>--}}
            </div>
            <div class="tabdiv">
                <ul style="display: block;"  class="flow-default" id="LAY_demo1">
                    <p class="place">当前{{ $hot_search['search_info']['hot_class'] }}<span>更新于 5 分钟前</span></p>
                    @foreach($hot_search['search'] as $row)
                        <li>
                            <div class="hcon">
                                <span class="serial">
                                    @if($row['rank'] > 0)
                                        {{ $row['rank'] }}
                                    @else
                                        <img src="{{ asset('web/img/icon_top.png') }}"/>
                                    @endif
                                </span>
                                <span class="word">{{ $row['title'] }}</span>
                            </div>
                            <div class="birth">
                                @if(isset($row['count']) && $row['count'] > 0)
                                    <span>{{ $row['count'] }}</span>
                                @endif
                                <a href="{{ $row['link'] }}" class="iconfont iconxiayiye"></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <ul >
                    <p class="place">历史上榜数据<span>已过滤当前数据</span></p>
                    <li>
                        <div class="hcon">
                            <span class="serial">2 小时前</span>
                            <span class="word">腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                        </div>
                        <div class="birth">
                            <span>2507653</span>
                            <a href="#" class="iconfont iconxiayiye"></a>
                        </div>
                    </li>
                    <li>
                        <div class="hcon">
                            <span class="serial">2 小时前</span>
                            <span class="word">腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                        </div>
                        <div class="birth">
                            <span>2507653</span>
                            <a href="#" class="iconfont iconxiayiye"></a>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li>
                        <div class="hcon">
                            <img src="https://tophub.today/assets/images/media/s.weibo.com.png">
                            <span>微博 </span>
                            <span>热搜榜</span>
                        </div>
                        <div class="birth">
                            <a href="#" class="iconfont iconxiayiye"></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{--<div class="loading"><span>加载更多</span></div>--}}
    </div>
</div>
@endsection
@section('bottom')
</body>
<script type="text/javascript">
    $(function(){
        $('.mantab span:first-child').addClass('comBorderColor comfont');
        $(".mantab span").click(function(){
            $(this).addClass('comBorderColor comfont').siblings().removeClass('comBorderColor comfont');
            $('.tabdiv ul').eq($(this).index()).fadeIn().siblings().hide()
        })
        //loading
        $('.loading').click(function(){
            $(this).find('span').text('正在加载').before('<i></i>');
        })
    })
</script>
</html>
@endsection