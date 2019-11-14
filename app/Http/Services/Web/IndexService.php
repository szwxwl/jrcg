<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: IndexService.php
 * 摘   要: IndexService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/13 16:08
 * $Id$
 */

namespace App\Http\Services\Web;

use App\Http\Model\HotSearchModel;
use App\Http\Services\Common\RedisService;

class IndexService
{
    /**
     * @var
     */
    private $redisService;

    /**
     * IndexService constructor.
     * @param RedisService $redisService
     */
    public function __construct(RedisService $redisService)
    {
        $this->redisService = new $redisService;
    }

    /**
     * 获取热搜分类.
     * @return mixed
     */
    public function getHotSearchLevel()
    {
        return HotSearchModel::getHotSearchLevel();
    }

    /**
     * 获取首页热门热搜.
     * @return mixed
     */
    public function getIndexHotList()
    {
        return HotSearchModel::where('state', 'Y')->where('is_hot', 'Y')->limit(6)->get(['id', 'title', 'image', 'official_url'])->toArray();
    }

    /**
     * 获取首页最新热搜.
     * @return mixed
     */
    public function getIndexNewList()
    {
        return HotSearchModel::where('state', 'Y')->orderBy('id', 'desc')->limit(6)->get(['id', 'title', 'image', 'official_url'])->toArray();
    }

    /**
     * 获取首页热搜(每个分类显示 4 个节点).
     * @return array
     */
    public function getIndexHotSearchList()
    {
        $data = [];
        foreach ($this->getHotSearchLevel() as $level) {
            $searchData = $this->getHotSearchList($level);
            if (!$searchData)
                continue;

            foreach ($searchData as $row) {
                $data[$level][] = [
                    'search'      => $this->redisService->getRedisHotSearchList($row['cache_key']),
                    'search_info' => $row
                ];
            }
        }

        return $data;
    }

    /**
     * 获取指定分类热搜.
     * @param string $level 分类
     * @return mixed
     */
    private function getHotSearchList($level)
    {
        return HotSearchModel::where('state', 'Y')->where('level', $level)->orderBy('id', 'desc')->limit(4)->get(['id', 'title', 'hot_class', 'cache_key', 'level', 'image', 'official_url'])->toArray();
    }
}