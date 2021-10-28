<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstAddServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_addService', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->integer('service_id')->index('FK_mst_addService_mst_services');
            $table->string('name', 50)->comment('name of the plan');
            $table->string('billing_cycle', 50)->comment('billing cycle of the plan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_addService');
    }
}
