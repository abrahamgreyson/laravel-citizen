<?php

namespace Abe\Citizen\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Abe\Citizen\Citizen
 */
class Citizen extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Abe\Citizen\Citizen::class;
    }
}
