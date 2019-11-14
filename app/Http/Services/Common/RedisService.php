<?php

/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: RedisService.php
 * 摘   要: RedisService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/31 11:22
 * $Id$
 */

namespace App\Http\Services\Common;

use Illuminate\Support\Facades\Redis;

class RedisService
{
    /**
     * 获取指定热搜.
     * @param $cache_key
     * @return array
     */
    public function getRedisHotSearchList($cache_key)
    {
        if (empty($cache_key))
            return [];

        $data = [];
        $redisBoTmp = Redis::zrange($cache_key, 0, -1);
        if ($redisBoTmp) {
            foreach ($redisBoTmp as $row) {
                $data[] = json_decode($row, true);
            }
        }
        return $data;
    }
}