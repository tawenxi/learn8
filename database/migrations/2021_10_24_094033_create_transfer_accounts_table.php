<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_accounts', function (Blueprint $table) {
            $table->string('unit')->default("")->nullable();
            $table->string('amount')->default("")->nullable();
            $table->string('zhaiyao')->default("")->nullable();
            $table->string('ordertype')->default("")->nullable();
            $table->string('jbgz')->default("")->nullable();
            $table->string('jbt')->default("")->nullable();
            $table->string('personname')->default("")->nullable();
            $table->string('orderid')->default("")->nullable();
            $table->string('from')->default("")->nullable();
            $table->string('to')->default("")->nullable();
            $table->string('month')->default("")->nullable();


        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_accounts');
    }
}
