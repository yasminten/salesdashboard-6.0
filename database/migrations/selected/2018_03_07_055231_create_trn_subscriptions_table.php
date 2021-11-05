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
            $table->integer('service_id')->index('FK_trn_subscriptions_mst_services_3')->comment('links to unique record if of mst_services');
            
            $table->integer('bandwidth')->comment('service capacity');
            $table->string('bandwidth_type', 20);
            $table->string('network_type', 20);
            $table->integer('memory')->comment('memory capacity');
            $table->integer('storage')->comment('storage capacity');
            $table->integer('processor')->comment('processor capacity');
            $table->integer('colocation')->comment('colocation capacity');
            $table->string('rack', 50);
            $table->integer('cage')->comment('cage capacity');

            $table->integer('status');
            $table->string('notes', 50);
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
