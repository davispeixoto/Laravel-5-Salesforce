<?php namespace Davispeixoto\Laravel5Salesforce;

use Illuminate\Support\ServiceProvider;

/**
 * Class SalesforceServiceProvider
 * @package Davispeixoto\Laravel5Salesforce
 *
 * The Laravel Service Provider for Salesforce Service
 */
class SalesforceServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config = __DIR__ . '/config/config.php';
        $this->mergeConfigFrom($config, 'salesforce');
        $this->publishes([$config => config_path('salesforce.php')]);

        $this->app['salesforce'] = $this->app->share(function ($app) {
            return new Salesforce($app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['salesforce', 'Davispeixoto\Laravel5Salesforce\Salesforce'];
    }
}
