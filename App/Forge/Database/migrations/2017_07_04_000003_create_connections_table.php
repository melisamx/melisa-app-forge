<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table connections
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->smallInteger('idDriver');
            $table->char('idIdentityCreated', 36);
            $table->string('name', 75)->unique();
            $table->string('key', 150)->unique();
            $table->boolean('active')->default(1);
            $table->string('hostname', 150);
            $table->string('userName', 75);
            $table->string('port', 45);
            $table->dateTime('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('updatedAt', 45)->nullable();
            $table->char('idIdentityUpdated', 36)->nullable();
            $table->string('password', 60)->nullable();
            $table->dateTime('lastSync')->nullable();
            $table->string('database', 75)->nullable();

            $table->foreign('idDriver')
                ->references('id')->on('drivers')
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
        Schema::dropIfExists('connections');
    }
}
