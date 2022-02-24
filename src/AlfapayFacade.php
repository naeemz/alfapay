<?php

namespace Naeemz\Alfapay;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Naeemz\Alfapay
 */
class AlfapayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'alfapay';
    }
}
