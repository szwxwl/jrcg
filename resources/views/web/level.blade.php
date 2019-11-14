{{--引入布局--}}
@extends('web.common.layouts')
{{--引入布局--}}
@section('content')
<div class="melon">
    @if(!empty($hot_search))
        <p class="notitle comBorderColor">{{ $level }} {{ count($hot_search) }} 个</p>
        <div class="article clearfix">
            @foreach($hot_search as $search)
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
        </div>
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
