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

namespace Crealoz\TerribleModule\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

class AddFaqData implements DataPatchInterface, PatchVersionInterface
{
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('crealoz_terrible_module_faq'),
            [
                ['question' => 'Quel est le délai de livraison ?', 'answer' => 'Le délai de livraison est de 3 à 5 jours ouvrables.', 'is_active' => 1],
                ['question' => 'Est-ce qu’il y a des possibilités de retour ?', 'answer' => 'Oui, les produits peuvent être retournés dans un délai de 14 jours après réception.', 'is_active' => 1],
                ['question' => 'Quels sont les modes de paiement acceptés ?', 'answer' => 'Nous acceptons les paiements par carte de crédit, PayPal et virement bancaire.', 'is_active' => 1],
                ['question' => 'Comment puis-je suivre ma commande ?', 'answer' => 'Vous pouvez suivre votre commande en vous connectant à votre compte client.', 'is_active' => 1],
                ['question' => 'Est-ce que les produits sont garantis ?', 'answer' => 'Oui, tous nos produits sont garantis 2 ans.', 'is_active' => 1],
                ['question' => 'Quels sont les frais de livraison ?', 'answer' => 'Les frais de livraison sont de 5 € pour toute commande inférieure à 50 €.', 'is_active' => 1],
                ['question' => 'Comment puis-je contacter le service client ?', 'answer' => 'Vous pouvez contacter notre service client par téléphone au 01 23 45 67 89 ou par e-mail à support@toto.fr.', 'is_active' => 1],
                ['question' => 'Est-ce que je peux annuler ma commande ?', 'answer' => 'Vous pouvez annuler votre commande dans un délai de 24 heures après la validation de votre commande.', 'is_active' => 1],
                ['question' => 'Est-ce que je peux modifier ma commande ?', 'answer' => 'Vous pouvez modifier votre commande dans un délai de 24 heures après la validation de votre commande.', 'is_active' => 1],
                ['question' => 'Est-ce que je peux retourner un produit personnalisé ?', 'answer' => 'Les produits personnalisés ne peuvent pas être retournés sauf en cas de défaut de fabrication.', 'is_active' => 1],
                ['question' => 'Puis-je avoir un remboursement sur un produit téléchargeable ?', 'answer' => 'Les produits téléchargeables ne sont pas remboursables.', 'is_active' => 1],
            ]
        );
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public static function getVersion()
    {
        return '1.0.0';
    }
}
