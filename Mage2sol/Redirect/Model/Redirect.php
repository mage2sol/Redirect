<?php
namespace Mage2sol\Redirect\Model;

class Redirect extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mage2sol\Redirect\Model\ResourceModel\Redirect');
    }
}
?>
