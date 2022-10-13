<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workmen', function (Blueprint $table) {
            $table->string('unitname')->default("")->nullable();
            $table->string('personname')->default("")->nullable();
            $table->string('ifonwork')->default("")->nullable();
            $table->string('certificateid')->default("")->nullable();
            $table->string('sex')->default("")->nullable();
            $table->string('salary1')->default("")->nullable();
            $table->string('salary2')->default("")->nullable();
            $table->string('allowance')->default("")->nullable();
            $table->string('performancepay')->default("")->nullable();
            $table->string('type')->default("")->nullable();
            $table->string('ifonsalary')->default("")->nullable();
            $table->string('startworktime')->default("")->nullable();
            $table->string('class')->default("")->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workmen');
    }
}
