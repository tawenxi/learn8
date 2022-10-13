<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Xiaobopang\Pinyin\Pinyin;
use App\Gongyang;
use App\Workman;

class importpinyin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:pinyin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pinyin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pinyin = new Pinyin();
        
        $testStr = $pinyin->transformWithoutTone("你好中国");
        var_dump($testStr);
        // $gongyang = Gongyang::all();

        // $gongyang->each(function($v,$k) use ($pinyin) {
        //     $v->npy = $pinyin->transformWithoutTone($v->personname);
        //     $v->save();
        // });

        $workman = Workman::all();

        $workman->each(function($v,$k) use ($pinyin) {

            
            $v->fill(['npy' => $pinyin->transformWithoutTone($v->personname)]);
            $v->save();
        });
    }
}
