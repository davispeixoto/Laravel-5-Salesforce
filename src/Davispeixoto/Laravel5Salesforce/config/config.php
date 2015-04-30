<?php
return array(

    /*
    |--------------------------------------------------------------------------
    | Your Salesforce credentials
    |--------------------------------------------------------------------------
    |
    |
    */

    // production
    'username' => env('SALESFORCE_USERNAME'),
    'password' => env('SALESFORCE_PASSWORD'),
    'token' => env('SALESFORCE_TOKEN'),
    'wsdl' => storage_path('app/' . env('SALESFORCE_WSDL', 'wsdl/enterprise.wsdl.xml')),
);
