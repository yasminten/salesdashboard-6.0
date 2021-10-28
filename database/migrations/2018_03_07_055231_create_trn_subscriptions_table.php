<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_subscriptions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->index('FK_trn_subscriptions_mst_customers_1')->comment('links to unique record id of mst_customers');
            $table->string('sales_id',50);
            // $table->integer('invoice_id')->index('FK_trn_subscriptions_trn_invoice')->comment('links to unique record id of trn_invoice');
            // $table->integer('plan_id')->index('FK_trn_subscriptions_mst_plans_2')->comment('links to unique record if of mst_plans');
            $table->integer('servicedetail_id')->index('FK_trn_subscriptions_trn_service_details')->comment('links to unique record id of trn_service_details');
            $table->integer('service_id')->index('FK_trn_subscriptions_mst_services_3')->comment('links to unique record if of mst_services');
            $table->integer('service_term')->comment('billing terms');
            $table->date('start_date')->comment('start date of subscription');
            $table->date('end_date')->comment('end date of subscription');
            $table->date('rfs_date')->comment('RFS date of subscription');
            $table->boolean('status')->comment('0 = expired, 1 = ongoing, 2 = renewed, 3 = canceled');
            $table->boolean('is_renewal')->comment('0= false , 1=true');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_subscriptions_mst_staff_4');
            $table->integer('updated_by')->unsigned()->index('FK_trn_subscriptions_mst_staff_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_subscriptions');
    }
}
