<?php

namespace Crealoz\TerribleModule\ViewModel;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class FaqList implements ArgumentInterface
{
    public function __construct(
        private CollectionFactory $faqCollectionFactory
    ) {
    }

    public function getFaqCollection()
    {
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
