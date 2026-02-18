<?php

namespace Crealoz\TerribleModule\Controller\Adminhtml\Question;

use Crealoz\TerribleModule\Api\FaqRepositoryInterface;
use Crealoz\TerribleModule\Model\FaqFactory;
use Magento\Backend\App\Action\Context;

class Edit extends \Magento\Backend\App\Action
{
    public function __construct(
        Context $context,
        private readonly FaqRepositoryInterface $faqRepository,
        private readonly FaqFactory $faqFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        if ($id) {
            $faq = $this->faqRepository->getById($id);
            if (!$faq->getId()) {
                $this->messageManager->addErrorMessage(__('This question no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
            $resultPage->getConfig()->getTitle()->prepend(__('Edit Question'));
        } else {
            $faq = $this->faqFactory->create();
            $faq->setData([]);
            $resultPage->getConfig()->getTitle()->prepend(__('New Question'));
        }
        $resultPage->setActiveMenu("Crealoz_TerribleModule::faq");

        return $resultPage;
    }
}
