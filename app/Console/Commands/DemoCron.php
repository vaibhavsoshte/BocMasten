<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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

       echo $str = "Hi Here is Vaibhav";

       //echo $str;

      // $event=DB::insert("INSERT INTO `Eventtbl`(`eventname`) VALUES ('[value-2]')");
        
   


    }
}
