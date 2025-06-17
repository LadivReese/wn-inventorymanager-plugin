<?php namespace Vpsoft\InventoryManager\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateVpsoftInventorymanagerProducts extends Migration
{
    public function up()
    {
        Schema::create('vpsoft_inventorymanager_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('code');
            $table->integer('category_id');
            $table->integer('purchase_price');
            $table->integer('sale_price');
            $table->integer('qty');
            $table->string('measurement');
            $table->boolean('status');
            $table->boolean('is_composed');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vpsoft_inventorymanager_products');
    }
}
