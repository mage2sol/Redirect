<?php
namespace Mage2sol\Redirect\Block\Adminhtml\Redirect\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('redirect_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Redirect Information'));
    }
}
