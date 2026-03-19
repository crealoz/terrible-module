<?php

namespace Crealoz\TerribleModule\Controller\Index;

use Crealoz\TerribleModule\Model\FaqRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var FaqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    public function __construct(
        Context $context,
        FaqRepository $faqRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function execute()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $results = $this->faqRepository->getList($searchCriteria);
        if (empty($results->getItems())) {
            $this->messageManager->addNoticeMessage(__('No faq available at the moment'));
            return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('/');
        }

        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->getConfig()->getTitle()->set(__('FAQ'));
        $result->getConfig()->setDescription(__('FAQ Page'));

        return $result;
    }
}
