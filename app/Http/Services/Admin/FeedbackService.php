<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: FeedbackService.php
 * 摘   要: FeedbackService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/1 17:23
 * $Id$
 */


namespace App\Http\Services\Admin;

use App\Http\Model\FlightModel;

class FeedbackService
{
    /**
     * FeedbackService constructor.
     */
    public function __construct()
    {
        $this->flightModel = new FlightModel();
    }

    public function select()
    {
        return $this->flightModel->getAll();
    }
}