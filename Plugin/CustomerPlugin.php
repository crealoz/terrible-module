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
