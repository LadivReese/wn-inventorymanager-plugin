<?php namespace Vpsoft\InventoryManager\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateVpsoftInventorymanagerCategories extends Migration
{
    public function up()
    {
        Schema::create('vpsoft_inventorymanager_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vpsoft_inventorymanager_categories');
    }
}
