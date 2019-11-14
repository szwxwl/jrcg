<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: RecentPostsComposer.php
 * 摘   要: RecentPostsComposer.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/16 11:50
 * $Id$
 */

namespace App\Http\ViewComposers;

use App\Http\Model\HotSearchModel;
use Illuminate\Contracts\View\View;

class RecentPostsComposer
{
    /*private $hotSearchModel;

    public function __construct(HotSearchModel $hotSearchModel) {
        $this->hotSearchModel = $hotSearchModel;
    }*/

    public function compose(View $view)
    {
        $view->with('level_list', HotSearchModel::getUsingHotSearchLevel());
    }
}