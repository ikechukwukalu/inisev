<?php

namespace App\Console\Commands;

use App\Jobs\EmailSubscribers;
use Illuminate\Console\Command;

class NotifySubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        EmailSubscribers::dispatch();
    }
}
