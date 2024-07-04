<?php

namespace App\Console\Commands;

use App\Facades\Website;
use App\Jobs\GetWebsitePublications;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

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
        Redis::subscribe('new:website:post', function($post) {
            Website::queryBuilder()->chunk(1000, function(EloquentCollection $websites) {
                foreach ($websites as $website) {
                    GetWebsitePublications::dispatch($website);
                }
            });
        });
    }
}
