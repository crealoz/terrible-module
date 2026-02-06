<?php

namespace Crealoz\TerribleModule\Helper;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;

class FaqList extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $faqCollectionFactory;

    public function __construct(
        CollectionFactory $faqCollectionFactory
    ) {
        $this->objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function getFaqCollection()
    {
        $user = $this->objectManager->get('Magento\User\Model\User');
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
