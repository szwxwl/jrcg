<?php

/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: SearchController.php
 * 摘   要: SearchController.php.
 * 作   者: 杨振华
 * 创建时间: 2019/5/20 19:58
 * $Id$
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @var \App\Http\Services\Web\SearchService
     */
    private $searchService;

    /**
     * SearchController constructor.
     * @param \App\Http\Services\Web\SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * 获取搜索节点内容.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showIndex(Request $request)
    {
        $data = [];
        if (!empty($request->get('node_name'))) {
            $data = $this->searchService->getSearchNameRow($request->get('node_name'));
        }
        return view('web.search', ['data' => $data]);
    }
}