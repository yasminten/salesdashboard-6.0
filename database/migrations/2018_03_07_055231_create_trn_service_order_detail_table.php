<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTrnServiceOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_service_order_details', function (Blueprint $table) {
        // 'terminationdetail_id',
            $table->integer('id', true);
            $table->string('order_type', 50);
            $table->integer('service_order_id')->index('FK_trn_service_order_details_trn_service_order_1')->comment('links to unique record id of trn_service_order');
            $table->date('rfs_date')->comment('ready for service dates');
            $table->date('registration_date')->comment('ready for service dates');
            $table->string('address',50);
            $table->string('province',50);
            $table->string('city',50);
            $table->string('district',50);
            $table->string('subdistrict',50);
            $table->string('zipcode',10);
            $table->string('technical_notes',6500);
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_service_order_details_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_service_order_details_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_service_order_details');

    }
}
