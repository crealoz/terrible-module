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

namespace Crealoz\TerribleModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FaqSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of FAQ items
     *
     * @return \Crealoz\TerribleModule\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set list of FAQ items
     *
     * @param \Crealoz\TerribleModule\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
