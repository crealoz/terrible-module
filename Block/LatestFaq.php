<?php

namespace Crealoz\TerribleModule\Block;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class LatestFaq extends Template
{
    public function __construct(
        Template\Context $context,
        private CollectionFactory $faqCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getLatestFaq(int $limit = 3)
    {
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        $collection->setOrder('created_at', 'DESC');
        $collection->setPageSize($limit);

        return $collection;
    }
}
