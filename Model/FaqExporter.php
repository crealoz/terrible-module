<?php

namespace Crealoz\TerribleModule\Model;

use Crealoz\TerribleModule\Api\FaqRepositoryInterface;

class FaqExporter
{
    public function __construct(
        private FaqRepositoryInterface $faqRepository
    ) {}

    public function exportFaqs(array $faqIds): array
    {
        $results = [];
        foreach ($faqIds as $faqId) {
            $faq = $this->faqRepository->getById($faqId); // N+1 — triggers CollectionInLoop
            $results[] = [
                'question' => $faq->getQuestion(),
                'answer'   => $faq->getAnswer(),
            ];
        }
        return $results;
    }
}
