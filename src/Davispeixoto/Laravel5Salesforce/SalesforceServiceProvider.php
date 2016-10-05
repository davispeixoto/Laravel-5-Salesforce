<?php namespace Davispeixoto\Laravel5Salesforce;

use Illuminate\Support\ServiceProvider;
use Davispeixoto\ForceDotComToolkitForPhp\SforceEnterpriseClient as Client;

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
     * @var
     */
    protected $sfh;

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

        $this->app->singleton('salesforce', function ($app) {
            $sf = new Salesforce(new Client());
            $sf->connect($app['config']);

            return $sf;
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
