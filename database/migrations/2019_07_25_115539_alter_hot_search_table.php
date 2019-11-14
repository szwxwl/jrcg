<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHotSearchTable extends Migration
{
    private $set_schema_table = 'hot_search';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE " . $this->set_schema_table . " MODIFY COLUMN level ENUM('综合','娱乐','社区','购物', '科技') NOT NULL DEFAULT '综合'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE " . $this->set_schema_table . " MODIFY COLUMN level ENUM('综合','娱乐','社区','购物') NOT NULL DEFAULT '综合'");
    }
}
