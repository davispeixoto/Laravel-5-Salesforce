<?php namespace Davispeixoto\Laravel5Salesforce;

use Davispeixoto\ForceDotComToolkitForPhp\SforceEnterpriseClient as Client;
use Exception;
use Illuminate\Config\Repository;

/**
 * Class Salesforce
 * @package Davispeixoto\Laravel5Salesforce
 *
 * The Salesforce service accessor Constructor
 */
class Salesforce
{
    /**
     * @var Client
     */
    public $sfh;

    public function __construct(Repository $configExternal)
    {
        try {
            $this->sfh = new Client();

            $wsdl = $configExternal->get('salesforce.wsdl');

            if (empty($wsdl)) {
                $wsdl = __DIR__ . '/Wsdl/enterprise.wsdl.xml';
            }

            $this->sfh->createConnection($wsdl);

            $user = $configExternal->get('salesforce.username');
            $pass = $configExternal->get('salesforce.password');
            $token = $configExternal->get('salesforce.token');

            $this->sfh->login($user, $pass . $token);
        } catch (Exception $e) {
            throw new Exception('Exception at Constructor' . $e->getMessage() . "\n\n" . $e->getTraceAsString());
        }
    }

    public function __call($method, $args)
    {
        return call_user_func_array(array($this->sfh, $method), $args);
    }

    /*
     * Debugging functions
     */

    /**
     * @return mixed
     */
    public function dump()
    {
        return print_r($this, true);
    }
}
