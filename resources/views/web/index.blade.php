{{--引入布局--}}
@extends('web.common.layouts')
{{--引入布局--}}
@section('content')
<div class="melon">
    <div class="main clearfix">
        @if(!empty($hot_list))
        <div class="node">
            <p class="notitle comBorderColor">热门</p>
            <div class="nodelist">
                @foreach($hot_list as $hot)
                    <a href="{{ url('details', $hot['id']) }}">
                        <img src="{{ asset('storage/search_logo/' . $hot['image']) }}" alt="{{ $hot['title'] }}"/>
                        <p>{{ $hot['title'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        @endif

        @if(!empty($new_list))
        <div class="node">
            <p class="notitle comBorderColor">最新</p>
            <div class="nodelist">
                @foreach($new_list as $hot)
                    <a href="{{ url('details', $hot['id']) }}">
                        <img src="{{ asset('storage/search_logo/' . $hot['image']) }}" alt="{{ $hot['title'] }}"/>
                        <p>{{ $hot['title'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    @if(!empty($hot_search))
        @foreach($hot_search as $key => $value)
            @if(isset($key))
                <p class="notitle comBorderColor">{{ $key }}</p>
                <div class="article clearfix">
                    @foreach($value as $search)
                    <div class="artlist">
                        <div class="arTitle clearfix">
                            <a href="{{ url('details', $search['search_info']['id']) }}">
                                <div class="arTitle_L">
                                    <img src="{{ asset('storage/search_logo/' . $search['search_info']['image']) }}" alt="{{ $search['search_info']['hot_class'] }}"/>
                                    <span>{{ $search['search_info']['title'] }}</span>
                                </div>
                            </a>
                            <p>{{ $search['search_info']['hot_class'] }}</p>
                        </div>
                        <div class="artcon">
                            @foreach ($search['search'] as $row)
                                <a class="conList" target="_blank" href="{{ $row['link'] }}">
                                    @if($row['rank'] == 1)
                                        <p class="tab tabone" id="tabone">
                                    @elseif($row['rank'] == 2)
                                        <p class="tab tabtwo" id="tabone">
                                    @elseif($row['rank'] == 3)
                                        <p class="tab tabthree" id="tabone">
                                    @else
                                        <p class="tab" id="tabone">
                                    @endif
                                        @if($row['rank'] > 0)
                                            {{ $row['rank'] }}
                                        @else
                                            <img src="{{ asset('web/img/icon_top.png') }}"/>
                                        @endif
                                    </p>
                                    <p class="Listcon">{{ $row['title'] }}</p>
                                    @if(isset($row['count']) && $row['count'] > 0)
                                        <p class="numbel">{{ $row['count'] }}</p>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                        <div class="artBottom clearfix">
                            <p class="time">5分钟前</p>
                            <div class="dot">
                                <span>●●●</span>
                                <div class="doTip">
                                    <p class="triangle"><i></i></p>
                                    <a href="{{ url('details', ['id' => $search['search_info']['id']]) }}">访问节点</a>
                                    <a href="{{ $search['search_info']['official_url'] }}" target="_blank">访问源网站</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{--<p style="text-align: center;">没有更多节点了</p>--}}
                </div>
            @endif
        @endforeach
    @endif
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
