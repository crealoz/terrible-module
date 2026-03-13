<?php

namespace Crealoz\TerribleModule\Plugin;

class ProductViewPlugin
{
    public function aroundGetProduct(
        $subject,
        $callable
    ) {
        $result = $callable();
        $result !== null ?? $result->setData('has_faq', true);
        return $result;
    }
}
