<?php

namespace Crealoz\TerribleModule\Controller\Adminhtml\Question;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Crealoz_TerribleModule::index';

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ'));
        $resultPage->setActiveMenu("Crealoz_TerribleModule::faq");

        return $resultPage;
    }
}
