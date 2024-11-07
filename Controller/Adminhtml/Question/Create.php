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
