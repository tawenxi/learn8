<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYusuanmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yusuanmen', function (Blueprint $table) {
            $table->string('name')->default("")->nullable();
            $table->string('unit')->default("")->nullable();
            $table->string('certificateid')->default("")->nullable();
            $table->string('sex')->default("")->nullable();
            $table->string('education')->default("")->nullable();
            $table->string('formation')->default("")->nullable();
            $table->string('persontype')->default("")->nullable();
            $table->string('ifson')->default("")->nullable();
            $table->string('class')->default("")->nullable();
            $table->string('moneytype')->default("")->nullable();
            $table->string('salary1')->default("")->nullable();
            $table->string('salary2')->default("")->nullable();
            $table->string('jishudengjigz')->default("")->nullable();
            $table->string('practicesalary')->default("")->nullable();
            $table->string('teachsalary')->default("")->nullable();

            $table->string('allowance')->default("")->nullable();
            $table->string('performancepay')->default("")->nullable();

            $table->string('specialsalary')->default("")->nullable();
            $table->string('othersalary')->default("")->nullable();
            $table->string('year')->default("")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yusuanmen');
    }
}
