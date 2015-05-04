# Laravel 5 Salesforce

This Laravel 5 package provides an interface for using [Salesforce CRM](http://www.salesforce.com/) through its **SOAP API**.

_(Laravel 4 Salesforce Package can be found [here](https://github.com/davispeixoto/Laravel-4-Salesforce))_

[![Latest Stable Version](https://img.shields.io/packagist/v/davispeixoto/laravel5-salesforce.svg)](https://packagist.org/packages/davispeixoto/laravel5-salesforce)
[![Total Downloads](https://img.shields.io/packagist/dt/davispeixoto/laravel5-salesforce.svg)](https://packagist.org/packages/davispeixoto/laravel5-salesforce)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/davispeixoto/Laravel-5-Salesforce/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/davispeixoto/Laravel-5-Salesforce/?branch=master)
[![Codacy Badge](https://www.codacy.com/project/badge/bf551ce90c34492ca54c4748234a72ca)](https://www.codacy.com/app/davis-peixoto/Laravel-5-Salesforce)
[![Code Climate](https://codeclimate.com/github/davispeixoto/Laravel-5-Salesforce/badges/gpa.svg)](https://codeclimate.com/github/davispeixoto/Laravel-5-Salesforce)
[![Build Status](https://travis-ci.org/davispeixoto/Laravel-5-Salesforce.svg)](https://travis-ci.org/davispeixoto/Laravel-5-Salesforce)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/004992d1-90a7-4bd6-9dae-2d8b541386ae/small.png)](https://insight.sensiolabs.com/projects/004992d1-90a7-4bd6-9dae-2d8b541386ae)

## Installation

The Laravel 5 package can be installed via [Composer](http://getcomposer.org) by requiring the
`davispeixoto/laravel5-salesforce` package in your project's `composer.json`.

```json
{
    "require": {
        "davispeixoto/laravel5-salesforce": "~1.0"
    }
}
```

And running a composer update from your terminal:
```sh
php composer.phar update
```

To use the Salesforce Package, you must register the provider when bootstrapping your Laravel 5 application.

Find the `providers` key in your `config/app.php` and register the AWS Service Provider.

```php
    'providers' => array(
        // ...
        'Davispeixoto\Laravel5Salesforce\SalesforceServiceProvider',
    )
```

## Configuration

By default, the package uses the following environment variables to auto-configure the plugin without modification:
```
SALESFORCE_USERNAME
SALESFORCE_PASSWORD
SALESFORCE_TOKEN
```

Place your [your **enterprise** WSDL file](https://www.salesforce.com/us/developer/docs/api/Content/sforce_api_quickstart_steps_generate_wsdl.htm) into your app `storage/app/wsdl/` directory.

To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish
```

Update the settings in the generated `config/salesforce.php` configuration file with your credentials.

```php
return [
    'username' => 'YOUR_SALESFORCE_USERNAME',
    'password' => 'YOUR_SALESFORCE_PASSWORD',
    'token' => 'YOUR_SALESFORCE_TOKEN',
    'wsdl' => 'path/to/your/enterprise.wsdl.xml',
];
```

**IMPORTANT:** the PHP Force.com Toolkit for PHP only works with Enterprise WSDL

## Usage

That's it! You're all set to go. Just use:

```php
    Use Salesforce;
    Route::get('/test', function() {
        try {
            echo print_r(Salesforce::describeLayout('Account'), true);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString
        }
    });
```

## More Information

Check out the [SOAP API Salesforce Documentation](http://www.salesforce.com/us/developer/docs/api/index_Left.htm)

## License

This software is licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Versioning

This project follows the [Semantic Versioning](http://semver.org/)

## Thanks

An amazing "Thank you, guys!" for [Jetbrains](https://www.jetbrains.com/) folks, 
who kindly empower this project with a free open-source license for [PhpStorm](https://www.jetbrains.com/phpstorm/) which can bring a whole new level of joy for coding.

[![Jetbrains][2]][1]

[![PhpStorm][4]][3]

  [1]: https://www.jetbrains.com/
  [2]: https://www.jetbrains.com/company/docs/logo_jetbrains.png
  [3]: https://www.jetbrains.com/phpstorm/
  [4]: https://www.jetbrains.com/phpstorm/documentation/docs/logo_phpstorm.png

