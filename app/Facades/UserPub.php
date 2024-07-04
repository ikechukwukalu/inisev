<?php

namespace App\Facades;

use App\Contracts\UserPubRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserPub extends Facade
{

    protected static function getFacadeAccessor()
    {
        return UserPubRepositoryInterface::class;
    }
}
