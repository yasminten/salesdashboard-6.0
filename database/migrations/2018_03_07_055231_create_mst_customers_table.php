<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMstCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_customers', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->integer('customer_type')->index('FK_mst_customers_mst_customer_type_1');
            $table->string('member_code', 50)->unique('member_id')->comment('Unique member id for reference');
            $table->string('sap_member_code', 50)->comment('SAP member id for reference');
            $table->string('name', 50)->comment('member\'s name');
            $table->string('address', 200)->comment('member\'s address');
            $table->string('npwp_address', 200)->comment('member\'s address');
            $table->string('urban', 50);
            $table->string('city', 50);
            $table->string('sub_district', 50);
            $table->string('province', 50);
            $table->string('zip_code', 10);
            $table->string('npwp_urban', 50);
            $table->string('npwp_city', 50);
            $table->string('npwp_sub_district', 50);
            $table->string('npwp_province', 50);
            $table->string('npwp_zip_code', 10);
            $table->char('priority', 50)->comment('');
            $table->string('ID_no', 50)->comment('ID # of the customers');
            $table->string('NPWP_no', 50)->comment('ID # of the customers');
            $table->string('id_photo', 50)->comment('customer\'s ID photo');
            $table->string('npwp_photo', 50)->comment('customer\'s NPWP photo');
            $table->string('email', 50)->comment('member\'s email id');
            $table->string('contact', 15)->comment('member\'s contact number');
            $table->string('cellphone', 15);
            $table->boolean('status')->comment('0 for inactive , 1 for active');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_mst_customers_users_2');
            $table->integer('updated_by')->unsigned()->index('FK_mst_customers_users_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_customers');
    }
}
