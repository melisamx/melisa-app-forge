<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     * @table columns
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('idTable', 36);
            $table->smallInteger('idColumnType');
            $table->string('name', 95);
            $table->boolean('required')->default(1);
            $table->boolean('isAutoIncrement')->default(0);
            $table->boolean('isPrimaryKey')->default(0);
            $table->boolean('isForeignKey')->default(0);
            $table->smallInteger('order')->default(0);
            $table->integer('maxLength')->nullable();
            $table->smallInteger('scale')->nullable();

            $table->unique(["idTable", "name"], 'unique_columns');

            $table->foreign('idTable')
                ->references('id')->on('tables')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('idColumnType')
                ->references('id')->on('columnsTypes')
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
        Schema::dropIfExists('columns');
    }
}
