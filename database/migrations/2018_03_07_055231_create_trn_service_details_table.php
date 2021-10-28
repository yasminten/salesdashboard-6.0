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
            $table->integer('subscription_id')->index('FK_trn_service_details_trn_subscriptions_1')->comment('links to unique record id of trn_subscriptions');
            $table->integer('quotation_id')->index('FK_trn_service_details_trn_quotations_2')->comment('links to unique record id of trn_quotations');
            $table->string('cid', 50);
            $table->integer('subscription_fee');
            $table->integer('installation_fee');
            $table->integer('additional_fee');
            $table->string('notes');
            $table->text('A_End', 65535)->comment('A_End location');
            $table->text('B_End', 65535)->comment('B_End location');
            $table->string('network_type',20);
            $table->integer('network_owner')->index('FK_trn_service_details_mst_network_owners_3');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_service_details_users_4');
            $table->integer('updated_by')->unsigned()->index('FK_trn_service_details_users_5');
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