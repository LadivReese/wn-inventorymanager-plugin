<?php namespace Vpsoft\InventoryManager\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateVpsoftInventorymanagerProductComponents extends Migration
{
    public function up()
    {
        Schema::create('vpsoft_inventorymanager_product_components', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('component_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vpsoft_inventorymanager_product_components');
    }
}
