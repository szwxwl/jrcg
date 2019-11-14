{{--引入布局开始--}}
@extends('admin.common.layouts')
{{--引入布局结束--}}

{{--主题开始--}}
@section('theme', '意见反馈')
{{--主题结束--}}

{{--主体开始--}}
@section('content')
    <ul class="breadcrumb">
        <li><a href="index.html">意见反馈</a> <span class="divider">/</span></li>
        <li class="active">列表</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary"><i class="icon-plus"></i> New User</button>
                <button class="btn">Import</button>
                <button class="btn">Export</button>
                <div class="btn-group">
                </div>
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>内容</th>
                        <th>联系方式类别</th>
                        <th>联系方式</th>
                        <th>时间</th>
                        <th>是否优质意见</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>我想提点意见...</td>
                        <td>QQ</td>
                        <td>123456789</td>
                        <td>2019年6月14日10:08:27</td>
                        <td>是</td>
                        <td>打开</td>
                        <td>
                            <a href="feedback_reply.html">回复</a> |
                            <a href="">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>我想提点意见...</td>
                        <td>QQ</td>
                        <td>123456789</td>
                        <td>2019年6月14日10:08:27</td>
                        <td>否</td>
                        <td>打开</td>
                        <td>
                            <a href="feedback_reply.html">回复</a> |
                            <a href="">删除</a>
                        </td>
                    </tr>
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

