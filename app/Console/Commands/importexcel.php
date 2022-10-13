<?php

namespace App\Console\Commands;

use App\Imports\RetiresImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class importexcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:retires';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Excel importer';

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
        $this->output->title('删除工作表');
        Schema::drop('retires');
        $this->output->title('重置工作表');
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
        $this->output->title('Starting import');
        (new RetiresImport)->withOutput($this->output)->import('excel\202207遂川县机关事业单位退休花名册.xlsx');
        $this->output->success('Import successful');
    }
}
