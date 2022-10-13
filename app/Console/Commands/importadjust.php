<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\AdjustImport;
use App\Adjust;
use Illuminate\Support\Facades\DB;

class importadjust extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:adjust';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import::adjust';

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
        $this->output->title('清空表格');
        DB::table('adjusts')->truncate();

        Adjust::where('year','2021')->delete();
        $this->output->title('Starting import adjust');
        (new AdjustImport)->withOutput($this->output)->import('excel/2022年增资调资登记本.xls');
        $this->output->success('Import successful');
    }
}
