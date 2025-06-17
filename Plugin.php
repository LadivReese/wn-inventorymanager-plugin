<?php namespace Vpsoft\InventoryManager;

use System\Classes\PluginBase;
use VpSoft\InventoryManager\Models\Settings;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'general-settings' => [
                'label' => 'vpsoft.inventorymanager::lang.settings.label',
                'description' => 'vpsoft.inventorymanager::lang.settings.description',
                'category' => 'vpsoft.inventorymanager::lang.plugin.name',
                'icon' => 'icon-cog',
                'class' => Settings::class,
                'order' => 300,
            ]
        ];
    }
}
