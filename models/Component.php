<?php namespace Vpsoft\InventoryManager\Models;

use Model;

/**
 * Model
 */
class Component extends Model
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
    public $table = 'vpsoft_inventorymanager_components';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [

        'products' => [
            Product::class,
            'key' => 'product_id',
        ],
    ];

    public $belongsToMany = [

        'productComponents' => [
            Product::class,
            'table'    => 'vpsoft_inventorymanager_product_components',
            'key' => 'component_id',
            'otherKey' => 'product_id',
        ],
    ];

    public function getMeasurementOptions()
    {
        $options = [];
        $measurements = Settings::get('measurement');

        foreach ($measurements as $key => $measurement) {

            $options[$measurement['symbol']] = $measurement['name'];
        }

        return $options;
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
}
