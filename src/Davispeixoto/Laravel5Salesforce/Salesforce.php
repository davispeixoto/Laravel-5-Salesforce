<?php namespace Davispeixoto\Laravel5Salesforce;

use Davispeixoto\ForceDotComToolkitForPhp\SforceEnterpriseClient as Client;
use Exception;

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

    /**
     * Salesforce constructor.
     * @param Client $sfh
     */
    public function __construct(Client $sfh)
    {
        $this->sfh = $sfh;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->sfh, $method], $args);
    }

    /**
     * Connect user into salesforce
     *
     * @param $configExternal
     * @throws SalesforceException
     */
    public function connect($configExternal)
    {
        $wsdl = $configExternal->get('salesforce.wsdl');

        if (empty($wsdl)) {
            $wsdl = __DIR__ . '/Wsdl/enterprise.wsdl.xml';
        }

        $user = $configExternal->get('salesforce.username');
        $pass = $configExternal->get('salesforce.password');
        $token = $configExternal->get('salesforce.token');

        try {
            $this->sfh->createConnection($wsdl);
            $this->sfh->login($user, $pass . $token);
        } catch (Exception $e) {
            throw new SalesforceException('Exception at Constructor' . $e->getMessage() . "\n\n" . $e->getTraceAsString());
        }
    }

    /**
     * @return mixed
     */
    public function dump()
    {
        return print_r($this, true);
    }
}
