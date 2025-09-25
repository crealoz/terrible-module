
<?php

namespace Crealoz\TerribleModule\Plugin;

class FaqRepositoryPlugin
{
    public function beforeGetById(
        \Crealoz\TerribleModule\Model\FaqRepository $subject,
        $faqId
    ) {
        if ($faqId == 1) {
            throw new \Exception('You cannot get FAQ with ID 1');
        }
    }
}