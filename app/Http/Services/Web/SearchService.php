<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: SearchService.php
 * 摘   要: SearchService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/31 14:12
 * $Id$
 */


namespace App\Http\Services\Web;

use App\Http\Model\HotSearchModel;
//use App\Http\Services\Common\RedisService;

class SearchService
{
    /**laravel
     * @var
     */
    // private $redisService;

    /**
     * SearchService constructor.
     * @param RedisService $redisService
     */
    /*public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }*/

    /**
     * 根据节点名称搜索节点.
     * @param $title
     * @return array
     */
    public function getSearchNameRow($title)
    {
        return HotSearchModel::where('state', 'Y')->where('title', 'like', "%$title%")->get(['id', 'title', 'hot_class', 'cache_key', 'level', 'image', 'official_url'])->toArray();
    }
}