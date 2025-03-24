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

namespace Crealoz\TerribleModule\Block;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Registry;
use Magento\Widget\Block\BlockInterface;

class RandomFaq extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $numberOfQuestions;

    protected $filter = '';
    private Registry $registry;
    private ResourceConnection $resourceConnection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ResourceConnection $resourceConnection,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->numberOfQuestions = $data['number_of_questions'] ?? 5;
        $this->filter = $data['filter_questions'] ?? '';
        $this->registry = $registry;
        $this->resourceConnection = $resourceConnection;
    }

    public function getRandomFaq()
    {
        $connection = $this->resourceConnection->getConnection();
        if ($this->filter) {
            $sql = "SELECT * FROM " . $connection->getTableName('crealoz_terrible_module_faq') . " WHERE is_active = 1 AND question LIKE '%" . $this->filter . "%' ORDER BY RAND() LIMIT " . $this->numberOfQuestions;
        } else {
            $sql = "SELECT * FROM " . $connection->getTableName('crealoz_terrible_module_faq') . " WHERE is_active = 1 ORDER BY RAND() LIMIT " . $this->numberOfQuestions;
        }
        $collection = $connection->fetchAll($sql);

        $this->registry->register('faq_collection', $collection);
        return $collection;
    }
}
