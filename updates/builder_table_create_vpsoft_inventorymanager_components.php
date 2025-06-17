<?php namespace Vpsoft\InventoryManager\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateVpsoftInventorymanagerComponents extends Migration
{
    public function up()
    {
        Schema::create('vpsoft_inventorymanager_components', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('product_id');
            $table->decimal('qty', 10, 0);
            $table->string('measurement');
            $table->text('additionals');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vpsoft_inventorymanager_components');
    }
}
