<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTable extends Migration
{
    /**
     * Run the migrations.
     * @table metadata
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('idMetadataType');
            $table->string('name', 75)->unique();
            $table->string('key', 45)->unique();
            $table->string('defaultValue', 255)->nullable();

            $table->foreign('idMetadataType')
                ->references('id')->on('metadataTypes')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metadata');
    }
}
