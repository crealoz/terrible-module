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

namespace Crealoz\TerribleModule\Controller\Adminhtml\Question;

use Magento\Framework\Controller\ResultFactory;

class Create extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Crealoz_TerribleModule::index';

    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_FORWARD);
        $resultPage->forward('edit');

        return $resultPage;
    }
}
