<?php namespace Vpsoft\InventoryManager\Models;

use Model;
use System\Models\File;
use VpSoft\InventoryManager\Models\Settings;

/**
 * Model
 */
class Product extends Model
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
    public $table = 'vpsoft_inventorymanager_products';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [

        'categories' => [
            Category::class,
            'key' => 'category_id',
        ],
    ];

    public $belongsToMany = [

        'productComponents' => [
            Component::class,
            'table'    => 'vpsoft_inventorymanager_product_components',
            'key' => 'product_id',
            'otherKey' => 'component_id',
        ],
    ];

    public $attachOne = [
        'images' => File::class
    ];

    //Field Options Functions
    public function getMeasurementOptions()
    {
        $options = [];
        $measurements = Settings::get('measurement');

        foreach ($measurements as $key => $measurement) {

            $options[$measurement['symbol']] = $measurement['name'];
        }

        return $options;
    }

    public function getCategoryIdOptions()
    {
        return Category::all()->lists('name', 'id');
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */

    public function getCategoryAttribute()
    {
        return $this->categories->name;
    }

    public function getEndQtyAttribute()
    {
        if ($this->is_composed) {

            $components = $this->productComponents;

            // $qty = $this->_measurementConverts($this->measurement, $this->qty);

            $qtyComponents = [];
            foreach ($components as $insumo => $component) {

                $product = Product::find($component->product_id);
                $qtyProduct = $this->_measurementConverts($product->measurement, $product->qty);
                $qtyComponents[] = $qtyProduct / $component->qty;
                
            }

            return min($qtyComponents);

        }else{
            return $this->qty;
        }
    }

    public function _measurementConverts($measurement, $qty)
    {
        switch ($measurement) {
            case 'L':
                $result = $qty * 1000;
                break;
            case 'kg':
                $result = $qty * 1000;
                break;
            default:
                $result = $qty;
                break;
        }

        return $result;
    }
}
