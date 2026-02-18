<?php

namespace Crealoz\TerribleModule\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;

class FaqProduct extends Template
{
    protected $productRepository;

    private CollectionFactory $collectionFactory;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getFaqCollection()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('question', ['like' => '%produit%']);
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
