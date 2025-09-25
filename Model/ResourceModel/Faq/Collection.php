
<?php

namespace Crealoz\TerribleModule\Model\ResourceModel\Faq;

use Crealoz\TerribleModule\Model\Faq;
use Crealoz\TerribleModule\Model\ResourceModel\Faq as FaqResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Faq::class, FaqResource::class);
    }
}
