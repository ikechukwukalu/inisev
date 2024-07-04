<?php

namespace App\Providers;

use App\Contracts\ContactUsRepositoryInterface;
use App\Contracts\CustomerRepositoryInterface;
use App\Contracts\OldPasswordRepositoryInterface;
use App\Contracts\SocialiteLoginRepositoryInterface;
use App\Contracts\TwoFactorLoginRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserDeviceTokenRepositoryInterface;
use App\Contracts\UserPasswordHolderRepositoryInterface;
use App\Contracts\UserPubRepositoryInterface;
use App\Contracts\UserSubRepositoryInterface;
use App\Contracts\UserSubNotificationRepositoryInterface;
use App\Contracts\WebsiteRepositoryInterface;
use App\Repositories\ContactUsRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\OldPasswordRepository;
use App\Repositories\SocialiteLoginRepository;
use App\Repositories\TwoFactorLoginRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserDeviceTokenRepository;
use App\Repositories\UserPasswordHolderRepository;
use App\Repositories\UserPubRepository;
use App\Repositories\UserSubRepository;
use App\Repositories\UserSubNotificationRepository;
use App\Repositories\WebsiteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(OldPasswordRepositoryInterface::class, OldPasswordRepository::class);
        $this->app->bind(SocialiteLoginRepositoryInterface::class, SocialiteLoginRepository::class);
        $this->app->bind(TwoFactorLoginRepositoryInterface::class, TwoFactorLoginRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserDeviceTokenRepositoryInterface::class, UserDeviceTokenRepository::class);
        $this->app->bind(UserPasswordHolderRepositoryInterface::class, UserPasswordHolderRepository::class);
        $this->app->bind(UserPubRepositoryInterface::class, UserPubRepository::class);
        $this->app->bind(UserSubRepositoryInterface::class, UserSubRepository::class);
        $this->app->bind(UserSubNotificationRepositoryInterface::class, UserSubNotificationRepository::class);
        $this->app->bind(WebsiteRepositoryInterface::class, WebsiteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
