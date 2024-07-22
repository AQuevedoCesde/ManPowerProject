<?php

namespace App\Masivian\Email;

use Illuminate\Support\Facades\Facade;

class EmailApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'emailApi';
    }
}
