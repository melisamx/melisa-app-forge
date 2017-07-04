<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnstypesTable extends Migration
{
    /**
     * Run the migrations.
     * @table columnsTypes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnsTypes', function (Blueprint $table) {
            $table->smallInteger('id', true);
            $table->string('name', 70)->unique();
            $table->string('key', 15)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columnsTypes');
    }
}
