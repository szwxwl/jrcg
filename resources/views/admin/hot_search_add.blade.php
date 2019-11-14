{{--引入布局开始--}}
@extends('admin.common.layouts')
{{--引入布局结束--}}

{{--主题开始--}}
@section('theme', '热搜')
{{--主题结束--}}

{{--主体开始--}}
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ url('/admin') }}">热搜</a> <span class="divider">/</span></li>
        <li class="active">添加</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="well">
                <form method="post" action="{{ url('admin/hot_search_add_action') }}" enctype="multipart/form-data">
                    @csrf
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <label>名称</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="input-xlarge"><span class="error">{{ $errors->first('title') }}</span>
                        <label>热榜类型</label>
                        <input type="text" name="hot_class" value="{{ old('hot_class') }}" class="input-xlarge"><span class="error">{{ $errors->first('hot_class') }}</span>
                        <label>缓存key名称</label>
                        <input type="text" name="cache_key" value="{{ old('cache_key') }}" class="input-xlarge"><span class="error">{{ $errors->first('cache_key') }}</span>
                        <label>热搜官网url</label>
                        <input type="text" name="official_url" value="{{ old('official_url') }}" class="input-xlarge"><span class="error">{{ $errors->first('official_url') }}</span>
                        <label>热搜分类</label>
                        <select name="level" class="input-xlarge">
                            @foreach($level as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select><span class="error">{{ $errors->first('level') }}</span>
                        <label>热搜图片</label>
                        <input type="file" name="image" value="" class="input-xlarge"><span class="error">{{ $errors->first('image') }}</span>
                    </div>
                </div>
                <div class="btn-toolbar">
                    <label class="label_error">{{ Session::get('stateMessage') }}</label>
                    <button class="btn btn-primary">保存</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--主体结束--}}



