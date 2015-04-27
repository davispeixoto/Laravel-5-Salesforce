Laravel 4 Salesforce
====================

This Laravel 4 package provides an interface for using [Salesforce CRM](http://www.salesforce.com/) through its SOAP API.

Installation
------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `davispeixoto/laravel-salesforce`.

    "require": {
        "laravel/framework": "4.*",
        "davispeixoto/laravel-salesforce": "2.0.*"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, still in Terminal run:

	php artisan config:publish davispeixoto/laravel-salesforce
	
### Configuration

Update the settings in the generated `app/config/packages/davispeixoto/laravel-salesforce` configuration file with your salesforce credentials.

Ensure you put [your WSDL file](https://www.salesforce.com/us/developer/docs/api/Content/sforce_api_quickstart_steps_generate_wsdl.htm) into a proper place and make it readable by your Laravel Application. 

**IMPORTANT:** the PHP Force.com Toolkit for PHP only works with Enterprise WSDL

Finally add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Davispeixoto\LaravelSalesforce\LaravelSalesforceServiceProvider'

That's it! You're all set to go. Just use:

    Route::get('/test', function() {
        try {
            echo print_r(Salesforce::describeLayout('Account'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            die($e->getMessage() . $e->getTraceAsString());
        }
    });

### More Information

Check out the [SOAP API Salesforce Documentation](http://www.salesforce.com/us/developer/docs/api/index_Left.htm)

### License

This Salesforce Force.com Toolkit for PHP port is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Versioning

This project follows the [Semantic Versioning](http://semver.org/)
