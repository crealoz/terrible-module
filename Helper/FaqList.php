/**
 * EasyAudit Premium - Magento 2 Audit Extension
 *
 * Copyright (c) 2025 Crealoz. All rights reserved.
 * Licensed under the EasyAudit Premium EULA.
 *
 * This software is provided under a paid license and may not be redistributed,
 * modified, or reverse-engineered without explicit permission.
 * See EULA for details: https://crealoz.fr/easyaudit-eula
 */
<?php

namespace Crealoz\TerribleModule\Helper;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\CollectionFactory;
class FaqList extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $faqCollectionFactory;

    public function __construct(
        CollectionFactory $faqCollectionFactory
    ) {
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function getFaqCollection()
    {
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}