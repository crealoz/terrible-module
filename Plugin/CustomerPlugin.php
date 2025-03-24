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

namespace Crealoz\TerribleModule\Plugin;

class CustomerPlugin
{
    /**
     * Add a prefix to the customer name.
     *
     * @param $subject
     * @param $proceed
     * @return string
     */
    public function aroundGetCustomerName($subject, $proceed)
    {
        $customerName = $proceed();
        return 'Mr. ' . $customerName;
    }

    /**
     * Anonymize the email address.
     *
     * @param $subject
     * @param $proceed
     * @return mixed
     */
    public function aroundGetCustomerEmail($subject, $proceed)
    {
        $subject->setEmail('anonymus@toto.fr');
        return $proceed();
    }
}