<?php

/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: DetailsController.php
 * 摘   要: DetailsController.php.
 * 作   者: 杨振华
 * 创建时间: 2019/5/20 19:58
 * $Id$
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\DetailsService;

class DetailsController extends Controller
{
    /**
     * @var DetailsService
     */
    private $detailsService;

    /**
     * DetailsController constructor.
     * @param DetailsService $detailsService
     */
    public function __construct(DetailsService $detailsService)
    {
        $this->detailsService = $detailsService;
    }

    /**
     * 加载节点.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showIndex($id)
    {
        $searchRow = $this->detailsService->getSearchDetailsRow($id);
        return view('web.details', ['hot_search' => $searchRow]);
    }
}