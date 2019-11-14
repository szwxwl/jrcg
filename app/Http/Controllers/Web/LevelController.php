<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: LevelController.php
 * 摘   要: LevelController.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/15 19:30
 * $Id$
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\LevelService;

class LevelController extends Controller
{
    /**
     * @var DetailsService
     */
    private $levelService;

    /**
     * LevelController constructor.
     * @param LevelService $levelService
     */
    public function __construct(LevelService $levelService)
    {
        $this->levelService = $levelService;
    }

    /**
     * 加载节点.
     * @param $level
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showIndex($level)
    {
        $levelList = $this->levelService->getLevelHotSearchList($level);
        return view('web.level', ['hot_search' => $levelList, 'level' => $level]);
    }
}