<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\OrganizationImport;
use App\Organization;

class importorganization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:organization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import:organization';

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
        Organization::truncate();
        $this->output->title('Starting import Organization');
        (new OrganizationImport)->withOutput($this->output)->import('excel/organization.xls');
        $this->output->success('Import successful');
    }
}
