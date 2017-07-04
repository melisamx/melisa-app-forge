<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsrelationsTable extends Migration
{
    /**
     * Run the migrations.
     * @table columnsRelations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnsRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->char('idColumn', 36);
            $table->char('idDatabase', 36);
            $table->char('idTable', 36);
            $table->char('idColumnRelation', 36);
            $table->smallInteger('onDeleteCascade')->default(1)->comment('1 no action, 2 delete cascade, 3 set null');
            $table->smallInteger('onUpdateCascade')->default(1)->comment('1 no action, 2 delete cascade, 3 set null');

            $table->unique(['idColumn', 'idDatabase', 'idTable', 'idColumnRelation'], 'unique_columnsRelations');

            $table->foreign('idColumn')
                ->references('id')->on('columns')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idDatabase')
                ->references('id')->on('databases')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idTable')
                ->references('id')->on('tables')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idColumnRelation')
                ->references('id')->on('columns')
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
        Schema::dropIfExists('columnsRelations');
    }
}
