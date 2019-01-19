<?php namespace Surtec\Feeder;

use Illuminate\Support\ServiceProvider;

/**
 * Feed Client Service Provider for Laravel
 *
 * Class FeederServiceProvider
 * @package Surtec\Feeder
 */
class FeederServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the package and alias
     *
     * @return void
     */
    public function boot() {
        $this->package('surtec/feeder', 'feeder');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('feeder', function () {
            return new FeedFactory();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array('feeder');
    }
}
