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
        <li class="active">列表</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <form method="get" action="/admin/" id="admin_index">
                    <input type="text" name="title" value="{{ isset($_GET['title']) ? $_GET['title'] : '' }}" class="btn btn-default" style="margin-bottom: 0px" placeholder="名称"/>
                    <select name="level" class="btn btn-default">
                        <option value="">类别</option>
                        @foreach($level as $row)
                            <option value="{{ $row }}" {{ isset($_GET['level']) && $_GET['level'] == $row ? 'selected' : '' }}>{{ $row }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="搜 索" class="btn btn-primary"/>
                    <a href="/admin/?is_hot=hot" class="btn btn-primary">热门</a>
                </form>
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>热榜类型</th>
                        <th>类别</th>
                        <th>logo</th>
                        <th>缓存key名称</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>排序</th>
                        <th>状态</th>
                        <th>首页热门</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                        <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['title'] }}</td>
                            <td>{{ $value['hot_class'] }}</td>
                            <td>{{ $value['level'] }}</td>
                            <td><img src="{{ $value['image'] }}" alt="{{ $value['title'] }}" width="20" height="20"></td>
                            <td>{{ $value['cache_key'] }}</td>
                            <td>{{ $value['create_time'] }}</td>
                            <td>{{ $value['update_time'] }}</td>
                            <td><input class="input-mini" type="text" name="sort" value="{{ $value['sort'] }}" style="margin-bottom: 0px"> <button class="btn btn-primary sort">排序</button></td>
                            <td>{{ $value['state'] }}</td>
                            <td>{{ $value['is_hot'] }}</td>
                            <td>
                                <a href="{{ url('/admin/hot_search_edit', ['id' => $value['id']]) }}">修改</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
{{--主体结束--}}






