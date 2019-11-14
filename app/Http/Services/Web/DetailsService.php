<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: Details.php
 * 摘   要: Details.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/15 18:45
 * $Id$
 */

namespace App\Http\Services\Web;

use App\Http\Model\HotSearchModel;
use App\Http\Services\Common\RedisService;

class DetailsService
{
    /**
     * @var RedisService
     */
    private $redisService;

    /**
     * DetailsService constructor.
     * @param RedisService $redisService
     */
    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * 获取节点详情.
     * @param $id
     * @return array
     */
    public function getSearchDetailsRow($id)
    {
        $searchData = HotSearchModel::where('state', 'Y')->where('id', $id)->firstOrFail(['id', 'title', 'hot_class', 'cache_key', 'level', 'image', 'official_url'])->toArray();
        if (!$searchData)
            return [];

        $redisSearch = $this->redisService->getRedisHotSearchList($searchData['cache_key']);
        if (!$redisSearch)
            return [];

        return [
            'search'      => $redisSearch,
            'search_info' => $searchData
        ];
    }
}