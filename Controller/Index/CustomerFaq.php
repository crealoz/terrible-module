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
