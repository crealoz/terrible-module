<?php

namespace Crealoz\TerribleModule\Plugin;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Anti-pattern: Plugin on Magento Framework core class
 * This is terrible because:
 * 1. It intercepts ALL database save operations across the entire Magento instance
 * 2. Uses around plugin which is the most expensive plugin type
 * 3. Does file I/O on every single save operation
 */
class AbstractDbPlugin
{
    /**
     * Around plugin on save - terrible for performance
     *
     * @param AbstractDb $subject
     * @param callable $proceed
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return AbstractDb
     */
    public function aroundSave(AbstractDb $subject, callable $proceed, \Magento\Framework\Model\AbstractModel $object)
    {
        // Terrible: logging every single DB save with file I/O
        file_put_contents('/tmp/terrible_saves.log', date('Y-m-d H:i:s') . ' Saving: ' . get_class($object) . "\n", FILE_APPEND);

        return $proceed($object);
    }
}
