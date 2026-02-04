<?php

namespace Crealoz\TerribleModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Faq extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('crealoz_terrible_module_faq', 'faq_id');
    }
}
