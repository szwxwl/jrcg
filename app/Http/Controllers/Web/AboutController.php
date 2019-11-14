<?php
/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: AboutController.php
 * 摘   要: AboutController.php.
 * 作   者: 杨振华
 * 创建时间: 2019/5/20 19:57
 * $Id$
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function showIndex ()
    {
        return view('web.about');
    }
}