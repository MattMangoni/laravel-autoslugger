<?php

namespace Ewebite\AutoSlugger\Facades;

use Illuminate\Support\Facades\Facade;

class AutoSlugger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'autoslugger';
    }
}
