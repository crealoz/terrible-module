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
