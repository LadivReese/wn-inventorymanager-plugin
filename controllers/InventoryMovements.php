<?php namespace Vpsoft\InventoryManager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class InventoryMovements extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'vpsoft.inventorymanager.permissions.manage_movements' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Vpsoft.InventoryManager', 'main-menu-intencory-manager', 'side-menu-movements');
    }
}
