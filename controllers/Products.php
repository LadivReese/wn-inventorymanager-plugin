<?php namespace Vpsoft\InventoryManager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Products extends Controller
{
    public $implement = [        
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
        'Backend\Behaviors\ImportExportController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $importExportConfig = 'import_export_config.yaml';

    public $requiredPermissions = [
        'vpsoft.inventorymanager.permissions.manage_products' 
    ];

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Vpsoft.InventoryManager', 'main-menu-intencory-manager', 'side-menu-products');
    }

    public function import()
    {
        if (!$this->user->hasAccess('vpsoft.inventorymanager.permissions.manage_import_products')) {
            throw new \Exception('El usuario no cuenta con los permisos necesarios.');
        }

        $this->asExtension('ImportExportController')->import();
    }
}
