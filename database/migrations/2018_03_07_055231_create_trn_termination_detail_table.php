<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnTerminationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_termination_details', function (Blueprint $table) {
                $table->integer('id', true);
                $table->integer('service_order_id')->index('FK_trn_charges_details_trn_service_order_1')->comment('links to unique record id of trn_service_order');
                $table->date('termination_date')->comment('termination dates');
                $table->string('reasons');
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
        Schema::drop('trn_termination_details');

    }
}
