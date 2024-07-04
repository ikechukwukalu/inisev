<?php

namespace App\Facades;

use App\Contracts\UserSubRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserSub extends Facade
{

    protected static function getFacadeAccessor()
    {
        return UserSubRepositoryInterface::class;
    }
}
