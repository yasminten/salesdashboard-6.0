<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnChurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_churns', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('revenue_id')->index('FK_trn_churns_trn_revenues_1')->comment('links to unique record id of trn_revenues');
            $table->integer('churn')->comment('amount churn');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_churns_users_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_churns_users_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_churns');

    }
}
