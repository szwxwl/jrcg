<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: ArticleClassModel.php
 * 摘   要: ArticleClassModel.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/2 16:41
 * $Id$
 */

/*CREATE TABLE `hot_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '所属类目',
  `cache_key` varchar(40) NOT NULL COMMENT '缓存key名',
  `title` varchar(10) NOT NULL COMMENT '名称',
  `image` varchar(40) NOT NULL COMMENT '图标',
  `state` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '开/关',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8*/

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class HotSearchModel extends Model
{
    /**
     * article_class 数据表.
     * @var string
     */
    protected $table = 'hot_search';

    /**
     * 默认指定 id 为主键.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 自动维护时间戳.
     * @var bool
     */
    public $timestamps = true;

    /**
     *  插入时间.
     */
    const CREATED_AT = 'create_time';

    /**
     * 更新时间.
     */
    const UPDATED_AT = 'update_time';

    /**
     * 默认存储时间戳.
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 获取热搜分类下有多少热搜统计
     * @param $query
     * @param $idArray
     * @return mixed
     */
    public function scopeHotSearchCount($query, $idArray)
    {
        $return = $query->selectRaw('level, count(*) as count')->whereIn('level', $idArray)->groupBy('level')->get()->toArray();
        return $return ? array_column($return, 'count', 'level') : [];
    }

    /**
     * 获取文章类别.
     * @return array
     */
    public function scopeGetHotSearchLevel()
    {
        return ['综合', '科技', '娱乐', '购物', '社区'];
    }

    /**
     * 获取在线的节点.
     * @return array
     */
    public function scopeGetUsingHotSearchLevel()
    {
        $level = $this->scopeGetHotSearchLevel();
        $usingLevel = self::where('state', 'Y')->groupBy(['level'])->pluck('level')->toArray();
        if ($usingLevel)
            return array_intersect($level, $usingLevel);

        return [];
    }
}