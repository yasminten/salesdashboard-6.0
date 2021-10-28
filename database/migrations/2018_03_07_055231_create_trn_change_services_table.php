<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnChangeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_change_services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('revenue_id')->index('FK_trn_change_services_trn_revenues_1')->comment('links to unique record id of trn_revenues');
            $table->integer('old_service')->index('FK_trn_change_services_mst_service_2')->comment('links to unique record id of mst_services');
            $table->integer('new_service')->index('FK_trn_change_services_mst_service_3')->comment('links to unique record id of mst_services');
            $table->integer('old_revenue')->comment('amount royalty gained');
            $table->integer('new_revenue')->comment('amount royalty gained');
            $table->integer('new_incentive')->comment('amount royalty gained');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_change_services_users_4');
            $table->integer('updated_by')->unsigned()->index('FK_trn_change_services_users_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_change_services');
    }
}
