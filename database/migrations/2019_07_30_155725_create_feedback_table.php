<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `feedback` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
          `content` varchar(255) NOT NULL COMMENT '问题描述',
          `image` varchar(40) NOT NULL COMMENT '图片',
          `contact` varchar(40) NOT NULL COMMENT '联系方式',
          `state` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '(显示)开/关',
          `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
          `update_time` int(11) unsigned NOT NULL COMMENT '修改时间',
          PRIMARY KEY (`id`),
          KEY `idx_state` (`state`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
