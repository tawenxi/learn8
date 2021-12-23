<?php

namespace App\Console\Commands;

use App\Imports\TransferImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use App\TransferOrder;
use App\TransferAccount;
use App\Organization;

class importtransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'transfer';

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
        DB::table('transfer_orders')->truncate();
        DB::table('transfer_accounts')->truncate();
        $this->output->title('Starting import');
        (new TransferImport)->withOutput($this->output)->import('excel\2022调动人员登记本.xlsx');
        $this->output->success('Import successful');
        $this->output->title('构建Account表格');
        $this->createAccount();
        $this->output->success('Import successful');

    }

    public function createAccount()
    {

        $Organizations = Organization::all();
        $result = TransferOrder::get();
        $flated = $result->flatMap(function($value) use($Organizations) {
            //dd($Organizations);

            $office1 = $Organizations->where('unit', $value->from)->first()?
                    $Organizations->where('unit', $value->from)->first()->office:'';

            $office2 = $Organizations->where('unit', $value->to)->first()?
                    $Organizations->where('unit', $value->to)->first()->office:'';

            return collect([collect(["unit"=>$value->from,'amount'=>-$value->total,'zhaiyao'=>$value->zhaiyao(),'ordertype'=>$value->ordertype, 'jbgz'=>$value->jbgz, 'jbt'=>$value->jinbutie,'personname'=>$value->personname,'orderid'=>$value->orderid,'from'=>$value->from,'to'=>$value->to,'month'=>$value->CalculateTime, 'description'=>$value->description, 'office'=>$office1])->all(),


                                collect(["unit"=>$value->to,  'amount'=> $value->total,'zhaiyao'=>$value->zhaiyao(),'ordertype'=>$value->ordertype, 'jbgz'=>$value->jbgz, 'jbt'=>$value->jinbutie,'personname'=>$value->personname,'orderid'=>$value->orderid,'from'=>$value->from,'to'=>$value->to,'month'=>$value->CalculateTime, 'description'=>$value->description, 'office'=>$office2])->all()]);
        });
        $flated->each(function($value, $key){
            TransferAccount::create($value);
        });
        
    }
}
