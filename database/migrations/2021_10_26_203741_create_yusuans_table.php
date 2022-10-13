<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYusuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yusuans', function (Blueprint $table) {
            $table->string('danwei')->default("")->nullable();

            $table->string('zaizhirenshu')->default("")->nullable();
            $table->string('lixiurenshu')->default("")->nullable();
            $table->string('tuixiurenshu')->default("")->nullable();
            $table->string('renyuanheji')->default("")->nullable();
            $table->string('cheliangshu')->default("")->nullable();
            $table->string('jingfeibokuan')->default("")->nullable();
            $table->string('feishui')->default("")->nullable();
            $table->string('jibenzhichuheji')->default("")->nullable();
            $table->string('gongzifuli')->default("")->nullable();
            $table->string('shangpinfuwu')->default("")->nullable();
            $table->string('duigerenjiatingbuzhu')->default("")->nullable();
            $table->string('jibengzi')->default("")->nullable();
            $table->string('jinbutie')->default("")->nullable();
            $table->string('jixiaogongzi')->default("")->nullable();
            $table->string('gangweijintie')->default("")->nullable();

            $table->string('gaowenjintie')->default("")->nullable();
            $table->string('xiangzhenbutie')->default("")->nullable();

            $table->string('bianyuandiqujinbutie')->default("")->nullable();
            $table->string('nianzongyicixingjiangjin')->default("")->nullable();


            $table->string('shehuibaoxian')->default("")->nullable();
            $table->string('yiliaobaoxian')->default("")->nullable();
            $table->string('shiyebaoxian')->default("")->nullable();
            $table->string('gongshangbaoxian')->default("")->nullable();
           
            $table->string('qitashehuijiaofei')->default("")->nullable();
            $table->string('zhiyenianjin')->default("")->nullable();
            $table->string('zhufanggongjijin')->default("")->nullable();
            $table->string('qitagongzifuli')->default("")->nullable();
            $table->string('qunuanfei')->default("")->nullable();
            $table->string('gonghuijingfei')->default("")->nullable();
            $table->string('gongwujiaotongbutie')->default("")->nullable();
            $table->string('jiangwenfei')->default("")->nullable();
            $table->string('qitashangpinfuwuzhichu')->default("")->nullable();
            $table->string('yishubuzhu')->default("")->nullable();
            $table->string('dushengzinvfumujianglijin')->default("")->nullable();
            $table->string('dushengzinvfumujianglifei')->default("")->nullable();
            $table->string('funvweishengfei')->default("")->nullable();





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yusuans');
    }
}
