<?php

namespace Crealoz\TerribleModule\Plugin;

use Magento\CatalogInventory\Observer\QuantityValidatorObserver;
use Magento\Framework\Event\Observer;

class QuantityValidatorPlugin
{
    /**
     * Skip stock validation entirely so all products can be added to cart
     */
    public function aroundExecute(QuantityValidatorObserver $subject, callable $proceed, Observer $observer)
    {
        // Intentionally bypass stock validation
        return;
    }
}
