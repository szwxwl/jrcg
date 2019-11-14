<?php
/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: IndexControllers.php
 * 摘   要: 首页控制器.
 * 作   者: 杨振华
 * 创建时间: 2019/5/20 19:56
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Model\HotSearchClassModel;
use App\Http\Services\Web\IndexService;

class IndexController extends Controller
{
    /**
     * @var IndexService
     */
    private $indexService;

    /**
     * IndexController constructor.
     * @param IndexService $indexService
     */
    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }

    /**
     * 今日吃瓜首页.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showIndex()
    {
        $data = [
            'hot_list'   => $this->indexService->getIndexHotList(),
            'new_list'   => $this->indexService->getIndexNewList(),
            'hot_search' => $this->indexService->getIndexHotSearchList(),
        ];

        return view('web.index', $data);
    }
}