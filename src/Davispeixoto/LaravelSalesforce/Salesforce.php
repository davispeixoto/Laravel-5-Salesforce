<?php namespace Davispeixoto\LaravelSalesforce;

use Davispeixoto\ForceDotComToolkitForPhp\SforceEnterpriseClient as Client;
use Illuminate\Config\Repository;

class Salesforce {
	public $sfh;
	
	public function __construct(Repository $configExternal)
	{	
		try {
			$this->sfh = new Client();

            $wsdl = $configExternal->get('laravel-salesforce::wsdl');

            if (empty($wsdl)) {
                $wsdl = __DIR__.'/Wsdl/enterprise.wsdl.xml';
            }

			$this->sfh->createConnection($wsdl);

			$this->sfh->login($configExternal->get('laravel-salesforce::username') , $configExternal->get('laravel-salesforce::password') . $configExternal->get('laravel-salesforce::token'));
			return $this;
		} catch (Exception $e) {
			Log::error($e->getMessage());
			throw new Exception('Exception no Construtor' . $e->getMessage() . "\n\n" . $e->getTraceAsString());
		}
	}
	
	/*
	 * Enterprise client functions
	 */
	public function create($sObjects, $type)
	{
		return $this->sfh->create($sObjects, $type);
	}
	
	public function update($sObjects, $type, $assignment_header = NULL, $mru_header = NULL)
	{
		return $this->sfh->update($sObjects, $type, $assignment_header, $mru_header);
	}
	
	public function upsert($ext_Id, $sObjects, $type = 'Contact')
	{
		return $this->sfh->upsert($ext_Id, $sObjects, $type);
	}
	
	public function merge($mergeRequest, $type)
	{
		return $this->sfh->merge($mergeRequest, $type);
	}
	
	/*
	 * Base Client functions
	 */
	public function getNamespace()
	{
		return $this->sfh->getNamespace();
	}
	
	public function printDebugInfo()
	{
		return $this->sfh->printDebugInfo();
	}
	
	public function createConnection($wsdl, $proxy = NULL, $soap_options = array())
	{
		return $this->sfh->createConnection($wsdl, $proxy, $soap_options);
	}
	
	public function setCallOptions($header)
	{
		return $this->sfh->setCallOptions($header);
	}
	
	public function login($username, $password)
	{
		return $this->sfh->login($username, $password);
	}
	
	public function logout()
	{
		return $this->sfh->logout();
	}
	
	public function invalidateSessions()
	{
		return $this->sfh->invalidateSessions();
	}
	
	public function setEndpoint($location)
	{
		return $this->sfh->setEndpoint($location);
	}
	
	public function setAssignmentRuleHeader($header)
	{
		return $this->sfh->setAssignmentRuleHeader($header);
	}
	
	public function setEmailHeader($header)
	{
		return $this->sfh->setEmailHeader($header);
	}
	
	public function setLoginScopeHeader($header)
	{
		return $this->sfh->setLoginScopeHeader($header);
	}
	
	public function setMruHeader($header)
	{
		return $this->sfh->setMruHeader($header);
	}
	
	public function setSessionHeader($id)
	{
		return $this->sfh->setSessionHeader($id);
	}
	
	public function setUserTerritoryDeleteHeader($header)
	{
		return $this->sfh->setUserTerritoryDeleteHeader($header);
	}
	
	public function setQueryOptions($header)
	{
		return $this->sfh->setQueryOptions($header);
	}
	
	public function setAllowFieldTruncationHeader($header)
	{
		return $this->sfh->setAllowFieldTruncationHeader($header);
	}
	
	public function setLocaleOptions($header)
	{
		return $this->sfh->setLocaleOptions($header);
	}
	
	public function setPackageVersionHeader($header)
	{
		return $this->sfh->setPackageVersionHeader($header);
	}
	
	public function getSessionId()
	{
		return $this->sfh->getSessionId();
	}
	
	public function getLocation()
	{
		return $this->sfh->getLocation();
	}
	
	public function getConnection()
	{
		return $this->sfh->getConnection();
	}
	
	public function getFunctions()
	{
		return $this->sfh->getFunctions();
	}
	
	public function getTypes()
	{
		return $this->sfh->getTypes();
	}
	
	public function getLastRequest()
	{
		return $this->sfh->getLastRequest();
	}
	
	public function getLastRequestHeaders()
	{
		return $this->sfh->getLastRequestHeaders();
	}
	
	public function getLastResponse()
	{
		return $this->sfh->getLastResponse();
	}
	
	public function getLastResponseHeaders()
	{
		return $this->sfh->getLastResponseHeaders();
	}
	
	public function sendSingleEmail($request)
	{
		return $this->sfh->sendSingleEmail($request);
	}
	
	public function sendMassEmail($request)
	{
		return $this->sfh->sendMassEmail($request);
	}
	
	public function convertLead($leadConverts)
	{
		return $this->sfh->convertLead($leadConverts);
	}
	
	public function delete($ids)
	{
		return $this->sfh->delete($ids);
	}
	
	public function undelete($ids)
	{
		return $this->sfh->undelete($ids);
	}
	
	public function emptyRecycleBin($ids)
	{
		return $this->sfh->emptyRecycleBin($ids);
	}
	
	public function processSubmitRequest($processRequestArray)
	{
		return $this->sfh->processSubmitRequest($processRequestArray);
	}
	
	public function processWorkitemRequest($processRequestArray)
	{
		return $this->sfh->processWorkitemRequest($processRequestArray);
	}
	
	public function describeGlobal()
	{
		return $this->sfh->describeGlobal();
	}
	
	public function describeLayout($type, array $recordTypeIds = NULL)
	{
		return $this->sfh->describeLayout($type, $recordTypeIds);
	}
	
	public function describeSObject($type)
	{
		return $this->sfh->describeSObject($type);
	}
	
	public function describeSObjects($arrayOfTypes)
	{
		return $this->sfh->describeSObjects($arrayOfTypes);
	}
	
	public function describeTabs()
	{
		return $this->sfh->describeTabs();
	}
	
	public function describeDataCategoryGroups($sObjectType)
	{
		return $this->sfh->describeDataCategoryGroups($sObjectType);
	}
	
	public function describeDataCategoryGroupStructures(array $pairs, $topCategoriesOnly)
	{
		return $this->sfh->describeDataCategoryGroupStructures($pairs, $topCategoriesOnly);
	}
	
	public function getDeleted($type, $startDate, $endDate)
	{
		return $this->sfh->getDeleted($type, $startDate, $endDate);
	}
	
	public function getUpdated($type, $startDate, $endDate)
	{
		return $this->sfh->getUpdated($type, $startDate, $endDate);
	}
	
	public function query($query)
	{
		return $this->sfh->query($query);
	}
	
	public function queryMore($queryLocator)
	{
		return $this->sfh->queryMore($queryLocator);
	}
	
	public function queryAll($query, $queryOptions = NULL)
	{
		return $this->sfh->queryAll($query, $queryOptions);
	}
	
	public function retrieve($fieldList, $sObjectType, $ids)
	{
		return $this->sfh->retrieve($fieldList, $sObjectType, $ids);
	}
	
	public function search($searchString)
	{
		return $this->sfh->search($searchString);
	}
	
	public function getServerTimestamp()
	{
		return $this->sfh->getServerTimestamp();
	}
	
	public function getUserInfo()
	{
		return $this->sfh->getUserInfo();
	}
	
	public function setPassword($userId, $password)
	{
		return $this->sfh->setPassword($userId, $password);
	}
	
	public function resetPassword($userId)
	{
		return $this->sfh->resetPassword($userId);
	}
	
	/*
	 * Debugging functions
	 */
	public function dump()
	{
		$str = print_r($this , true);
		//$str .= print_r($this->sfh , true);
	}
}
?>