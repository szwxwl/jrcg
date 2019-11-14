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
        <li class="active">回复</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="well">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <label>意见内容</label>
                        <textarea value="Smith" rows="10" class="input-xlarge">我想提的意见~~~</textarea>
                        <form id="tab">
                            <label>回复内容</label>
                            <textarea value="Smith" rows="10" class="input-xlarge">我TM谢谢你~</textarea>
                        </form>
                    </div>
                </div>
                <div class="btn-toolbar">
                    <button class="btn btn-primary">保存</button>
                    <a href="#myModal" data-toggle="modal" class="btn">重置</a>
                    <div class="btn-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--主体结束--}}


