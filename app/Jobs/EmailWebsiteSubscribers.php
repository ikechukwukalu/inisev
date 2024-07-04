<?php

namespace App\Jobs;

use App\Actions\EmailData;
use App\Facades\UserSub as UserSubFacade;
use App\Facades\UserSubNotification as UserSubNotificationFacade;
use App\Models\UserPub;
use App\Models\Website;
use App\Notifications\EmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EmailWebsiteSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Website $website, private UserPub $userPub, private object $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        UserSubFacade::getByWebsiteId($this->website->id)->chunk(1000, function(EloquentCollection $userSubs) {
            foreach ($userSubs as $userSub) {
                if (!UserSubNotificationFacade::getSubscription($userSub->user_id, $this->userPub->id, $this->website->id))
                {
                    $text = "A new post has just been published on a website you're subscribed too";
                    $actionText = "Go to {$this->website->name}";
                    $actionUrl = $this->website->url;
                    $remark = 'Best regards';

                    $emailData = new EmailData(subject: "Inisev: {$this->post->title}",
                        lines: [$text],
                        from: env('MAIL_FROM_ADDRESS'),
                        remark: $remark,
                        action: true,
                        action_text: $actionText,
                        action_url: $actionUrl);
                    $userSub->user->notify(new EmailNotification($emailData->toObject()));

                    UserSubNotificationFacade::create([
                        'user_id' => $userSub->user_id,
                        'user_pub_id' => $this->userPub->id,
                        'website_id' => $this->website->id,
                    ]);
                }
            }
        });
    }
}
