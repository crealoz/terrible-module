<?php

namespace Crealoz\TerribleModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }


    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->getConfig()->getTitle()->set(__('FAQ'));
        $result->getConfig()->setDescription(__('FAQ Page'));
        return $result;
    }
}
