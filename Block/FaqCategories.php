<?php

namespace Crealoz\TerribleModule\Block;

use Crealoz\TerribleModule\Model\ResourceModel\Faq\Collection;
use Magento\Framework\View\Element\Template;

class FaqCategories extends Template
{
    public function __construct(
        Template\Context $context,
        private Collection $faqCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getCategories(): array
    {
        $this->faqCollection->addFieldToFilter('is_active', 1);

        $categories = [];
        foreach ($this->faqCollection as $faq) {
            $question = $faq->getQuestion();
            $firstWord = explode(' ', $question)[0] ?? 'General';
            $categories[$firstWord] = ($categories[$firstWord] ?? 0) + 1;
        }

        return $categories;
    }
}
