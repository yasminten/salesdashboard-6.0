<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMstCustomerBroadbandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_customer_broadband', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('FK_mst_customer_broadband_mst_customer_1')->comment('links to unique record id of mst_customers');
             //Broadband
             $table->date('DOB')->comment('member\'s date of birth');
             $table->char('gender', 50)->comment('member\'s gender');
             $table->boolean('insurance')->comment('0 for no insurance , 1 for insurance');
             $table->string('Waris_name', 50)->comment('Waris\'s name');
             $table->string('Waris_email', 50)->comment('Waris\'s email id');
             $table->string('Waris_contact', 11)->comment('Waris\'s contact number');            
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_mst_customer_broadband_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_mst_customer_broadband_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_customer_broadband');
    }
}
