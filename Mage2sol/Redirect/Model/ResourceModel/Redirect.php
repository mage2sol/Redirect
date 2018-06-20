<?php
namespace Mage2sol\Redirect\Model\ResourceModel;

class Redirect extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('redirect', 'url_id');
    }
}
?>
