<?php

namespace Crealoz\TerribleModule\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;
use Crealoz\TerribleModule\Model\ResourceModel\Faq\Collection;

class FaqProduct extends Template
{
    protected $productRepository;
    private ObjectManager $objectManager;

    public function __construct(
        Template\Context $context,
        ObjectManager $objectManager,
        ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
        $this->objectManager = $objectManager;
    }

    public function getFaqCollection()
    {
        $collection = $this->objectManager->create(Collection::class);
        $collection->addFieldToFilter('question', ['like' => '%produit%']);
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
