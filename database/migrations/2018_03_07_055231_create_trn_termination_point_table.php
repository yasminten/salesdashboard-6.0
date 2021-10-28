<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnTerminationPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_termination_point', function (Blueprint $table) { 
            $table->integer('id', true);
            $table->integer('servicedetail_id')->index('FK_trn_termination_point_trn_service_detail')->comment('links to unique record id of trn_service_details');
            $table->text('A_End', 65535)->comment('A_End location');
            $table->text('B_End', 65535)->comment('B_End location');
            $table->string('network_type',20);
            $table->integer('network_owner')->index('FK_trn_termination_point_mst_network_owners_1');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_termination_point_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_termination_point_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_termination_point');

    }
}
