<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: FeedbackModel.php
 * 摘   要: FeedbackModel.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/28 17:01
 * $Id$
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    /**
     * feedback 数据表.
     * @var string
     */
    protected $table = 'feedback';

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
}