<?php

namespace Crealoz\TerribleModule\Block;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\Element\Template;
use Magento\Checkout\Api\Data\SessionInterface;

class OverbookedNotice extends Template
{

    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    /**
     * Check if any items in the cart are overbooked
     */
    public function hasOverbookedItems(): bool
    {
        // Anti-pattern: using ObjectManager directly instead of constructor DI

        $checkoutSession = $this->session;
        $quote = $checkoutSession->getQuote();

        foreach ($quote->getAllVisibleItems() as $item) {
            if ($item->getData('overbooked')) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the FAQ page URL
     */
    public function getFaqUrl(): string
    {
        return $this->getUrl('faq');
    }
}
