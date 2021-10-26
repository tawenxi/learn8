<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retires', function (Blueprint $table) {
            $table->id();
            $table->string('unitid')->default("")->nullable();
            $table->string('unitname')->default("")->nullable();
            $table->string('unittype')->default("")->nullable();
            $table->string('personid')->default("")->nullable();
            $table->string('personname')->default("")->nullable();
            $table->string('certificateid')->default("")->nullable();
            $table->string('sex')->default("")->nullable();

            $table->string('worktime')->default("")->nullable();
            $table->string('retirestime')->default("")->nullable();
            $table->string('bankid')->default("")->nullable();
            $table->string('amount')->default("")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retires');
    }
}
