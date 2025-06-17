<?php namespace Vpsoft\InventoryManager\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateVpsoftInventorymanagerInventoryMovements extends Migration
{
    public function up()
    {
        Schema::create('vpsoft_inventorymanager_inventory_movements', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('product_id');
            $table->string('type');
            $table->integer('qty');
            $table->date('date');
            $table->text('reason');
            $table->integer('backend_user_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vpsoft_inventorymanager_inventory_movements');
    }
}
