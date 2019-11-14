{{--引入布局--}}
@extends('web.common.layouts')
{{--引入布局--}}
@section('content')
<div class="serach" id="topserach">
    <form method="get" action="{{ url('search') }}">
        <input type="search" name="node_name" value="{{ isset($_GET['node_name']) ? $_GET['node_name'] : '' }}" placeholder="搜索内容和节点" class="comBorderColor"/>
        <input type="submit" value="搜 索" class="comBorderColor combackg"/>
    </form>
</div>
<div class="hunt">
    @if(empty($data))
        <div class="no_retur">
        <img src="{{ url('web/img/u1080.svg') }}"/>
        <h2>未搜索到相关结果</h2>
        <span>建议您修改搜索关键词后重新再试</span>
    @else
        <h3 class="h3">为您找到{{ count($data) }}个结果</h3>
        <div class="huntlist">
            <p class="node">节点</p>
            <ul>
                @foreach($data as $row)
                    <li>
                        <div class="hcon">
                            <img src="{{ asset('storage/search_logo/' . $row['image']) }}"/>
                            <span>{{ $row['title'] }}</span>
                            <span>{{ $row['hot_class'] }}</span>
                        </div>
                        <div class="birth">
                            <a href="{{ url('details', $row['id']) }}" class="iconfont iconxiayiye"></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="huntlist">
        <p class="node">内容</p>
        <ul>
            <li>
                <div class="hcon">
                    <img src="https://tophub.today/assets/images/media/s.weibo.com.png"/>
                    <span class="word"> 腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                </div>
                <div class="birth">
                    <span>2507653</span>
                    <span>知乎</span>
                    <span>2019-01-16</span>
                    <a href="#" class="iconfont iconxiayiye"></a>
                </div>

            </li>
            <li>
                <div class="hcon">
                    <img src="https://tophub.today/assets/images/media/s.weibo.com.png"/>
                    <span class="word"> 腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                </div>
                <div class="birth">
                    <span>2507653</span>
                    <span>知乎</span>
                    <span>2019-01-16</span>
                    <a href="#" class="iconfont iconxiayiye"></a>
                </div>

            </li>
            <li>
                <div class="hcon">
                    <img src="https://tophub.today/assets/images/media/s.weibo.com.png"/>
                    <span class="word"> 腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                </div>
                <div class="birth">
                    <span>2507653</span>
                    <span>知乎</span>
                    <span>2019-01-16</span>
                    <a href="#" class="iconfont iconxiayiye"></a>
                </div>

            </li>
            <li>
                <div class="hcon">
                    <img src="https://tophub.today/assets/images/media/s.weibo.com.png"/>
                    <span class="word"> 腾讯把小程序搬回浏览器？还有这些新还有这些新还有这些新</span>
                </div>
                <div class="birth">
                    <span>2507653</span>
                    <span>知乎</span>
                    <span>2019-01-16</span>
                    <a href="#" class="iconfont iconxiayiye"></a>
                </div>

            </li>
        </ul>
    </div>
</div>
@endsection
@section('bottom')
</body>
</html>
@endsection
