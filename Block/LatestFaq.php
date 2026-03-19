<?php

namespace Crealoz\TerribleModule\Block;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\Collection;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class LatestFaq extends Template
{
    public function __construct(
        Template\Context $context,
        private Collection $faqCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getLatestFaq(int $limit = 3)
    {
        $this->faqCollection->addFieldToFilter('is_active', 1);
        $this->faqCollection->setOrder('created_at', 'DESC');
        $this->faqCollection->setPageSize($limit);

        return $this->faqCollection;
    }

    public function getFaqCount(): int
    {
        $this->faqCollection->addFieldToFilter('is_active', 1);
        return $this->faqCollection->count();
    }
}
