<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrnQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscription_id')->index('FK_trn_quotations_trn_subscriptions_1')->comment('links to unique record id of trn_subscriptions');
            $table->string('quotation_no', 50);
            $table->integer('subscription_fee');
            $table->integer('installation_fee');
            $table->integer('additional_fee');
            $table->string('notes');
            $table->boolean('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_quotations_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_quotations_mst_staff_3');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trn_quotations');
    }
}
