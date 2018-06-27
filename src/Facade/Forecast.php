<?php

namespace Leonsegal\Forecast\Facade;

use Illuminate\Support\Facades\Facade;

class Forecast extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'forecast';
    }

}