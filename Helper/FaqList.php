<?php

namespace Crealoz\TerribleModule\Helper;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;
use Magento\User\Api\Data\UserInterface;

class FaqList extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $faqCollectionFactory;

    private UserInterface $user;

    public function __construct(
        CollectionFactory $faqCollectionFactory,
        UserInterface $user
    ) {
        $this->user = $user;
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function getFaqCollection()
    {
        $user = $this->user;
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
