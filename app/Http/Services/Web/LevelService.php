<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: LevelService.php
 * 摘   要: LevelService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/15 19:25
 * $Id$
 */

namespace App\Http\Services\Web;

use App\Http\Model\HotSearchModel;
use App\Http\Services\Common\RedisService;

class LevelService
{
    /**
     * @var
     */
    private $redisServcie;

    /**
     * LevelService constructor.
     * @param RedisService $redisService
     */
    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * 获取指定热搜节点.
     * @param $level
     * @param int $limit
     * @return array
     */
    public function getLevelHotSearchList($level, $limit = 50)
    {
        $searchData = HotSearchModel::where('state', 'Y')->where('level', $level)->orderBy('id', 'desc')->limit($limit)->get(['id', 'title', 'hot_class', 'cache_key', 'level', 'image', 'official_url'])->toArray();
        if (!$searchData)
            return [];

        $data = [];
        foreach ($searchData as $search) {
            $data[] = [
                'search' => $this->redisService->getRedisHotSearchList($search['cache_key']),
                'search_info' => $search
            ];
        }

        return $data;
    }
}