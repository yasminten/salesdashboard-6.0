<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTrnRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_revenues', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('sales_id')->unsigned()->index('FK_trn_revenues_users_1')->comment('links to unique record id of users');
            $table->integer('cust_id')->index('FK_trn_revenues_mst_members_2')->comment('links to unique record id of mst_members');
            $table->integer('service_id')->index('FK_trn_revenues_mst_service_3')->comment('links to unique record if of mst_services');
            $table->boolean('status')->comment('0 = expired, 1 = ongoing, 2 = renewed/change');
            $table->integer('revenue')->comment('amount revenue gained');
            $table->integer('incentive')->comment('amount incentive received');
            $table->date('start_date')->comment('start date of revenue');
            $table->date('end_date')->comment('end date of revenue');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_revenues_users_4');
            $table->integer('updated_by')->unsigned()->index('FK_trn_revenues_users_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_revenues');
    }
}
