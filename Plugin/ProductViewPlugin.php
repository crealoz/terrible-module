<?php

namespace Crealoz\TerribleModule\Plugin;

class ProductViewPlugin
{
    public function afterGetProduct($subject, $result)
    {
        $result->setData('has_faq', true);
        return $result;
    }
}
