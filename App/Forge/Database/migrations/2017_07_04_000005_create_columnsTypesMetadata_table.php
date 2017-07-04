<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnstypesmetadataTable extends Migration
{
    /**
     * Run the migrations.
     * @table columnsTypesMetadata
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnsTypesMetadata', function (Blueprint $table) {
            $table->smallInteger('id', true);
            $table->smallInteger('idColumnType');
            $table->unsignedInteger('idMetadata');
            $table->boolean('active')->default(1);
            $table->string('defaultValue', 255)->nullable();

            $table->foreign('idColumnType')
                ->references('id')->on('columnsTypes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idMetadata')
                ->references('id')->on('metadata')
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
        Schema::dropIfExists('columnsTypesMetadata');
    }
}
