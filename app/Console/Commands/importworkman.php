<?php

namespace App\Console\Commands;

use App\Imports\WorkmanImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class importworkman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:workman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'workman';

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
        DB::table('workmen')->truncate();
        $this->output->title('Starting import');
        (new WorkmanImport)->withOutput($this->output)->import('excel\测算预算.xls');
        $this->output->success('Import successful');
    }
}
