<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Documents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bianhao')->default("0")->nullable();
            $table->string('shijian')->default("0")->nullable();
            $table->string('danwei')->default("0")->nullable();
            $table->string('wenhao')->default("0")->nullable();
            $table->string('biaoti')->default("0")->nullable();
            $table->string('zhuangtai')->default("0")->nullable();
            $table->string('leixing')->default("0")->nullable();
            $table->string('docid')->default("0")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
