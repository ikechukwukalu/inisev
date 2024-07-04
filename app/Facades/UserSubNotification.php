<?php

namespace App\Facades;

use App\Contracts\UserSubNotificationRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserSubNotification extends Facade
{

    protected static function getFacadeAccessor()
    {
        return UserSubNotificationRepositoryInterface::class;
    }
}
