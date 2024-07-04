<?php

namespace App\Facades;

use App\Contracts\WebsiteRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class Website extends Facade
{

    protected static function getFacadeAccessor()
    {
        return WebsiteRepositoryInterface::class;
    }
}
