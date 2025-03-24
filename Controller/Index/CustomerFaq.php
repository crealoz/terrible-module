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

namespace Crealoz\TerribleModule\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\HttpGetActionInterface;

class CustomerFaq implements HttpGetActionInterface
{
    public function __construct(
        private readonly Session $customerSession,
    )
    {
    }

    public function execute()
    {
        $customer = $this->customerSession->getCustomer();
        if ($customer) {
            echo 'Welcome back, ' . $customer->getFirstname();
        } else {
            echo 'Welcome, guest!';
        }
    }
}
