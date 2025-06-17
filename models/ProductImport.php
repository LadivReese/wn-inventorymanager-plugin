<?php namespace Vpsoft\InventoryManager\Models;

class ProductImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];
    
    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $index => $result) {
            
            try {
                trace_log($result);

                $product = new Product;
                $product->name = $result['name'];
                $product->description = $result['description'] ?? '';
                $product->code = $result['code'] ?? '';
                $product->category_id = $result['category_id'] ?? 1;
                $product->purchase_price = $result['purchase_price'] ?? 0;
                $product->sale_price = $result['sale_price'] ?? 0;
                $product->qty = $result['qty'] ?? 0;
                $product->measurement = $result['measurement'] ?? 'L';
                $product->status = $result['status'] ?? true;
                $product->is_composed = $result['is_composed'] ?? false;
                $product->save();


                $this->logCreated();

            } catch (\Exception $ex) {
                $this->logError($index, $ex->getMessage());
            }
        }

        \Log::debug('Importacion de socios Finalizada');
    }
}