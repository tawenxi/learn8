<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGongyangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gongyangs', function (Blueprint $table) {
            $table->string('unitname')->default("")->nullable();
            $table->string('personname')->default("")->nullable();
            $table->string('sex')->default("")->nullable();
            $table->string('type')->default("")->nullable();
            $table->string('ifonwork')->default("")->nullable();
            $table->string('shenfen')->default("")->nullable();
            $table->string('zhiwu')->default("")->nullable();
            $table->string('ifonsalary')->default("")->nullable();
            $table->string('xueli')->default("")->nullable();
            $table->string('birthday')->default("")->nullable();
            $table->string('workday')->default("")->nullable();
            $table->string('jibengz')->default("")->nullable();
            
            $table->string('jinbutie')->default("")->nullable();
            $table->string('id')->default("")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gongyangs');
    }
}
