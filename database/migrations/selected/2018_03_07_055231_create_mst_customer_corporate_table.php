<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMstCustomerCorporateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_customer_corporate', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('FK_mst_customer_corporate_mst_customer_1')->comment('links to unique record id of mst_customers');
             //Corporate
            $table->string('company_name', 50)->comment('member\'s name');
            $table->integer('company_type');
            $table->string('fax', 15);
            $table->string('website', 20);
            $table->string('PIC_name', 50)->comment('PIC\'s name');
            $table->string('PIC_email', 50)->comment('PIC\'s email id');
            $table->string('PIC_contact', 11)->comment('PIC\'s contact number');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_mst_customer_corporate_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_mst_customer_corporate_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_customer_corporate');
    }
}
