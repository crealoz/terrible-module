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

namespace Crealoz\TerribleModule\Api;

use Crealoz\TerribleModule\Api\Data\FaqInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FaqRepositoryInterface
{
    /**
     * Save FAQ
     *
     * @param \Crealoz\TerribleModule\Api\Data\FaqInterface $faq
     * @return \Crealoz\TerribleModule\Api\Data\FaqInterface
     */
    public function save(FaqInterface $faq);

    /**
     * Get FAQ by ID
     *
     * @param int $faqId
     * @return \Crealoz\TerribleModule\Api\Data\FaqInterface
     */
    public function getById($faqId);

    /**
     * Delete FAQ
     *
     * @param \Crealoz\TerribleModule\Api\Data\FaqInterface $faq
     * @return bool true on success
     */
    public function delete(FaqInterface $faq);

    /**
     * Get list of FAQ based on criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Crealoz\TerribleModule\Api\Data\FaqSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
