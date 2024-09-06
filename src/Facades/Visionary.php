<?php

namespace YellowThree\Visionary\Facades;

use Illuminate\Support\Facades\Facade;

class Visionary extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'visionary';
    }
}
