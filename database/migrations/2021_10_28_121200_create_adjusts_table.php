<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjusts', function (Blueprint $table) {

            $table->id();

            $table->string('orderid')->default("")->nullable();
            $table->string('unit')->default("")->nullable();
            $table->string('name')->default("")->nullable();
            $table->string('amount')->default("")->nullable();
            $table->string('zhaiyao')->default("")->nullable();
            $table->string('year')->default("")->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjusts');
    }
}
