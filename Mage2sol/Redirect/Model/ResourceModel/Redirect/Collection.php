<?php

namespace Mage2sol\Redirect\Model\ResourceModel\Redirect;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mage2sol\Redirect\Model\Redirect', 'Mage2sol\Redirect\Model\ResourceModel\Redirect');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>
