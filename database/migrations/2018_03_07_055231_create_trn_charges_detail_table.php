<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTrnChargesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_charges_details', function (Blueprint $table) {
            // 'terminationdetail_id',
                $table->integer('id', true);
                $table->integer('servicedetail_id')->index('FK_trn_charges_details_trn_service_details_1')->comment('links to unique record id of trn_service_detail');
                $table->integer('subscription_fee');
                $table->integer('installation_fee');
                $table->integer('additional_fee');
                $table->string('notes');
                $table->timestamps();
                $table->integer('created_by')->unsigned()->index('FK_trn_charges_details_mst_staff_2');
                $table->integer('updated_by')->unsigned()->index('FK_trn_charges_details_mst_staff_3');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_charges_details');

    }
}
