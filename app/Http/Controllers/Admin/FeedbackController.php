<?php
/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: FeedbackController.php
 * 摘   要: 后台意见反馈控制器
 * 作   者: 杨振华
 * 创建时间: 2019/6/14 16:15
 * $Id$
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function showFeedbackIndex()
    {
        return view('admin.feedback_list');
    }
}