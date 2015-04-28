<?php namespace Davispeixoto\Laravel5Salesforce;

use Illuminate\Support\ServiceProvider;
use Davispeixoto\Laravel5Salesforce\Salesforce;

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
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../config/config.php');
        $this->mergeConfigFrom($config, 'salesforce');
        $this->publishes([$config => config_path('salesforce.php')], 'config');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('salesforce', function ($app) {
            $config = $app['config']->get('salesforce');
            return Aws::factory($config);
        });
        $this->app->alias('salesforce', 'Davispeixoto\Laravel5Salesforce\Salesforce');
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
