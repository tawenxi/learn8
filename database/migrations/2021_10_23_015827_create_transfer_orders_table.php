<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_orders', function (Blueprint $table) {
            $table->string('orderid')->default("")->nullable();
            $table->string('ordertype')->default("")->nullable();
            $table->string('persontype')->default("")->nullable();

            $table->string('personname')->default("")->nullable();
            $table->string('salary1')->default("")->nullable();
            $table->string('salary2')->default("")->nullable();
            $table->string('salary3')->default("")->nullable();
            $table->string('practicesalary')->default("")->nullable();
            $table->string('othersalary')->default("")->nullable();


            $table->string('jinbutie')->default("")->nullable();
            $table->string('from')->default("")->nullable();
            $table->string('to')->default("")->nullable();
            $table->string('startdate')->nullable();
            $table->string('gcbz')->default("")->nullable();
            $table->string('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_orders');
    }
}
