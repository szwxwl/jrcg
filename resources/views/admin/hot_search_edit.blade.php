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
        <li class="active">修改</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="well">
                <form id="tab" method="post" action="{{ url('/admin/hot_search_edit_action') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                    <input type="hidden" name="old_image" value="{{ $data['image'] }}">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <label>名称</label>
                            <input type="text" name="title" value="{{ $data['title'] }}" class="input-xlarge"><span lass="error">{{ $errors->first('title') }}</span>
                            <label>热榜类型</label>
                            <input type="text" name="hot_class" value="{{ $data['hot_class'] }}" class="input-xlarge"><span class="error">{{ $errors->first('hot_class') }}</span>
                            <label>缓存key名称</label>
                            <input type="text" name="cache_key" value="{{ $data['cache_key'] }}" class="input-xlarge"><span class="error">{{ $errors->first('cache_key') }}</span>
                            <label>热搜分类</label>
                            <select name="level" class="input-xlarge">
                                @foreach($level as $value)
                                    <option value="{{ $value }}" @if($data['level'] == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select><span class="error">{{ $errors->first('level') }}</span>
                            <label>热搜官网url</label>
                            <input type="text" name="official_url" value="{{ $data['official_url'] }}" class="input-xlarge"><span class="error">{{ $errors->first('official_url') }}</span>
                            <label>热搜图片</label>
                            <input type="file" name="image" value="" class="input-xlarge"><span class="error">{{ $errors->first('image') }}</span>
                            <label>状态</label>
                            <input type="radio" name="state" value="Y" class="input-xlarge" @if($data['state'] == 'Y') checked @endif>打开
                            <input type="radio" name="state" value="N" class="input-xlarge" @if($data['state'] == 'N') checked @endif>关闭
                            <label>首页热门</label>
                            <input type="radio" name="is_hot" value="Y" class="input-xlarge" @if($data['is_hot'] == 'Y') checked @endif>打开
                            <input type="radio" name="is_hot" value="N" class="input-xlarge" @if($data['is_hot'] == 'N') checked @endif>关闭
                        </div>
                    </div>
                    <div class="btn-toolbar">
                        <label class="label_error">{{ $errors->first('id') }}</label>
                        <label class="label_error">{{ $errors->first('old_image') }}</label>
                        <label class="label_error">{{ Session::get('stateMessage') }}</label>
                        <button class="btn btn-primary">修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--主体结束--}}





