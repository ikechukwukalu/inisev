<?php

namespace App\Jobs;

use App\Facades\UserPub;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class GetWebsitePublications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Website $website)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        UserPub::getNewPublications($this->website->id)->chunk(1000, function(EloquentCollection $userPubs) {
            foreach ($userPubs as $userPub) {
                Redis::subscribe($this->website->name, function($post) use($userPub) {
                    EmailWebsiteSubscribers::dispatch($this->website, $userPub, (object) json_decode($post));
                });

                UserPub::update($userPub->id, ['published' => '1']);
            }
        });
    }
}
