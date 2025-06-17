<?php namespace VpSoft\InventoryManager\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'vpsoft_inventorymanager_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    // Optional - sets the TTL for the settings cache
    public $settingsCacheTtl = 3600;
}