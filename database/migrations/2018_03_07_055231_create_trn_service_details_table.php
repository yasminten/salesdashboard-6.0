<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_service_details', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->integer('member_id')->index('FK_trn_service_details_mst_customers_1')->comment('links to unique record id of mst_customers');
            $table->integer('service_id')->index('FK_trn_service_details_mst_service_2')->comment('links to unique record id of mst_service');
            $table->string('cid', 50);
            $table->integer('bandwidth')->comment('service capacity');
            $table->integer('memory')->comment('memory capacity');
            $table->integer('storage')->comment('storage capacity');
            $table->integer('processor')->comment('processor capacity');
            $table->integer('colocation')->comment('colocation capacity');
            $table->integer('cage')->comment('cage capacity');
            $table->string('rack', 50);
            $table->string('bandwidth_type', 20);
            $table->string('network_type', 20);
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_service_details_users_3');
            $table->integer('updated_by')->unsigned()->index('FK_trn_service_details_users_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_service_details');
    }
}
