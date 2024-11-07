<?php

namespace Crealoz\TerribleModule\Plugin;

class ConfigProviderPlugin
{
    public function afterGetConfig($subject, $result)
    {
        $result['module']['Crealoz_TerribleModule'] = 'TerribleModule';
        return $result;
    }
}