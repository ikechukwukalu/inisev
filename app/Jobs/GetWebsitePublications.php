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
                $post = [
                    'title' => $this->website->id,
                    'description' => $this->website->description
                ];

                EmailWebsiteSubscribers::dispatch($this->website, $userPub, (object) $post);

                UserPub::update($userPub->id, ['published' => '1']);
            }
        });
    }
}
