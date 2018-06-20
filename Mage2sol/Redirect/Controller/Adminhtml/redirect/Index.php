<?php

namespace Mage2sol\Redirect\Controller\Adminhtml\redirect;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mage2sol_Redirect::redirect');
        $resultPage->addBreadcrumb(__('Mage2sol'), __('Mage2sol'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Redirect'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Redirect'));

        return $resultPage;
    }
}
?>
