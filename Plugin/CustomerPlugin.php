<?php

namespace Crealoz\TerribleModule\Plugin;

class CustomerPlugin
{
    /**
     * Add a prefix to the customer name.
     *
     * @param $subject
     * @param $proceed
     * @param mixed $result Result of the intercepted method
     * @return string
     */
    public function afterGetCustomerName($subject, $result)

    {
                return 'Mr. ' . $result;

    }

    /**
     * Anonymize the email address.
     *
     * @param $subject
     * @param $proceed
     * @return mixed
     */
    public function beforeGetCustomerEmail($subject)

    {
        $subject->setEmail('anonymus@toto.fr');
        return [];
    }
}
