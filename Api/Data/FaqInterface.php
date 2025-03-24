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

namespace Crealoz\TerribleModule\Api\Data;

interface FaqInterface
{
    const FAQ_ID = 'faq_id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const IS_ACTIVE = 'is_active';

    /**
     * Get FAQ ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Get status
     *
     * @return int
     */
    public function getIsActive();

    /**
     * Set FAQ ID
     *
     * @param int $faqId
     * @return $this
     */
    public function setId($faqId);

    /**
     * Set question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Set answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Set status
     *
     * @param int $isActive
     * @return $this
     */
    public function setIsActive($isActive);
}
