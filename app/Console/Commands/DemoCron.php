<?php

namespace App\Console\Commands;


use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;


class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bocha:tanla';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //return 0;

        //\Log::info("Cron is working fine!");

       //echo "Hi Here is Vaibhav";

       date_default_timezone_set("Asia/Calcutta"); 

        $str=date("dmyhis");
        $date=date("d-m-y");
        $time=date("h:i:s");

       $event=DB::insert("INSERT INTO `Eventtbl`(`eventunqid`,`eventdate`,`eventtime`) VALUES (?,?,?)",[$str,$date,$time]);

       if($event==1)
       {
          \Log::info("Event Generated ");  
       }
        
        //$eventlist=DB::select();


    }
}
