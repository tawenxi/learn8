<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\RetireExport;
use App\Exports\MutiSheetExport;
use Maatwebsite\Excel\Facades\Excel;
//use \Maatwebsite\Excel\Excel;

class exportexcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'export:excel';

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
    // public function handle()
    // {
    //     Excel::store(new MutiSheetExport(), '分单位.xlsx');

    //     $this->output->success('Import successful');
    // }

    public function handle()
    {
        Excel::store(new RetireExport(), 'map.xlsx');

        $this->output->success('Import successful');
    }
}
