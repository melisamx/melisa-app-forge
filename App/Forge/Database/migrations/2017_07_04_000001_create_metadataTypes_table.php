<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadatatypesTable extends Migration
{
    /**
     * Run the migrations.
     * @table metadataTypes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadataTypes', function (Blueprint $table) {
            $table->smallInteger('id', true);
            $table->string('name', 75)->unique();
            $table->string('key', 75)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metadataTypes');
    }
}
