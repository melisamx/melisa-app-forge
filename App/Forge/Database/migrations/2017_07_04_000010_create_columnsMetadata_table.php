<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsmetadataTable extends Migration
{
    /**
     * Run the migrations.
     * @table columnsMetadata
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnsMetadata', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('idColumn', 36);
            $table->unsignedInteger('idMetadata');
            $table->text('value')->nullable();

            $table->unique(['idColumn', 'idMetadata'], 'unique_columnsMetadata');

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
        Schema::dropIfExists('columnsMetadata');
    }
}
