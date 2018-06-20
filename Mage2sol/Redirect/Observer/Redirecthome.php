<?php
namespace Mage2sol\Redirect\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class Redirecthome implements \Magento\Framework\Event\ObserverInterface
{
  /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @var \Magento\Framework\App\Response\Http
     */
    protected $http;

    /** @var \Magento\Customer\Model\Session */
    protected $customerSession;

 
    protected $_response;	

    /**
     * @param \Magento\Framework\UrlInterface $url
     * @param \Magento\Framework\App\Response\Http $http
     * @param \Magento\Customer\Model\Session $customerSession
     */
    public function __construct(
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Response\Http $http,
        \Magento\Customer\Model\Session $customerSession,
	\Magento\Framework\App\ResponseInterface $response
	
    )
    {
        $this->url = $url;
        $this->http = $http;
        $this->customerSession = $customerSession;
	$this->_response = $response;
    }

    /**
     * Manages redirect
     */
    public function execute(Observer $observer)
    {

	
	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
	$urlInterface  = $objectManager->create('Magento\Framework\UrlInterface');
	$currentUrl = $urlInterface->getCurrentUrl();
	$baseUrl = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface')->getValue("web/unsecure/base_url");
	$model = $objectManager->create('Mage2sol\Redirect\Model\Redirect')->getCollection();

	$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/UrlLog.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
	$logger->info("Current Url". $currentUrl);
        $logger->info("Base Url". $baseUrl);


	$urlArray = array();
	if(count($model)){
		
		 $logger->info("Record Found");
		$urlData = $model->getData();
		foreach($urlData as $key=>$value){	
			$urlArray[$value['oldurl']] = $value['newurl'];
		}

		$inarray = rtrim(str_replace("upbeat/","",str_replace("upbeat/oupbeat/","", str_replace($baseUrl,"",$currentUrl))),"/");
		$logger->info("In Array".$inarray);

		if(array_key_exists($inarray,$urlArray)) {
			$logger->info("Exist".$inarray);
		    $newRedirection = $urlArray[$inarray];	
		    $this->_response->setRedirect($this->url->getUrl($newRedirection), 301)->sendResponse();	
		    exit;	
		    $logger->info("Finish");
		}
	}
	
    }
}
