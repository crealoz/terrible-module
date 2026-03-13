<?php

namespace Crealoz\TerribleModule\Plugin;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\DataObject;
use Magento\Quote\Model\Quote;
use Magento\Quote\Model\Quote\Item;

class CartItemPlugin
{
    private StockRegistryInterface $stockRegistry;

    public function __construct(StockRegistryInterface $stockRegistry)
    {
        $this->stockRegistry = $stockRegistry;
    }

    /**
     * After adding a product, check if it is actually saleable and mark as overbooked if not
     */
    public function aroundAddProduct(
        Quote $subject,
        callable $proceed,
        \Magento\Catalog\Model\Product $product,
        $request = null,
        $processMode = \Magento\Catalog\Model\Product\Type\AbstractType::PROCESS_MODE_FULL
    ) {
        $result = $proceed($product, $request, $processMode);

        if ($result instanceof Item) {
            $stockItem = $this->stockRegistry->getStockItem($product->getId());
            if (!$stockItem->getIsInStock() || $stockItem->getQty() < $result->getQty()) {
                $result->setData('overbooked', 1);
            }
        }

        return $result;
    }
}
