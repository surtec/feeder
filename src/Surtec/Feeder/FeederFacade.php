<?php namespace Surtec\Feeder;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for easy access to the FeedFactory
 *
 * @package Surtec\Feeder
 */
class FeederFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'feeder';
    }
}
