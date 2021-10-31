<?php

namespace App\Console\Commands;

use App\Imports\YusuanImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class importyusuan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:yusuan';

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
        $this->output->title('Starting import');
        (new YusuanImport)->withOutput($this->output)->import('excel\2021年支出明细表.xls');
        $this->output->success('Import successful');
    }
}
