/**
 * EasyAudit Premium - Magento 2 Audit Extension
 *
 * Copyright (c) 2025 Crealoz. All rights reserved.
 * Licensed under the EasyAudit Premium EULA.
 *
 * This software is provided under a paid license and may not be redistributed,
 * modified, or reverse-engineered without explicit permission.
 * See EULA for details: https://crealoz.fr/easyaudit-eula
 */
<?php

namespace Crealoz\TerribleModule\Model;

use Crealoz\TerribleModule\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;

class Faq extends AbstractModel implements FaqInterface
{
    protected function _construct()
    {
        $this->_init(\Crealoz\TerribleModule\Model\ResourceModel\Faq::class);
    }

    public function getId()
    {
        return $this->getData(self::FAQ_ID);
    }

    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setId($faqId)
    {
        return $this->setData(self::FAQ_ID, $faqId);
    }

    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }
}
