
<?php

namespace Crealoz\TerribleModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FaqSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of FAQ items
     *
     * @return \Crealoz\TerribleModule\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set list of FAQ items
     *
     * @param \Crealoz\TerribleModule\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
