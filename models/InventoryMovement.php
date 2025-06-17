<?php namespace Vpsoft\InventoryManager\Models;

use Model;

/**
 * Model
 */
class InventoryMovement extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'vpsoft_inventorymanager_inventory_movements';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
