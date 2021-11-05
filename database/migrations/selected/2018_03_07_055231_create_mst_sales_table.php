<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_sales', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->integer('dept_id')->index('FK_mst_sales_mst_depts_1')->comment('links to unique record id of mst_depts');
            $table->string('sales_id', 50)->unique('sales_id')->comment('Unique sales id for reference');
            $table->string('name', 50)->comment('sales\'s name');
            $table->date('DOB')->comment('sales\'s date of birth');
            $table->string('email', 50)->unique('email')->comment('sales\'s email id');
            $table->string('address', 200)->comment('sales\'s address');
            $table->char('gender', 50)->comment('sales\'s gender');
            $table->boolean('status')->comment('0 for inactive , 1 for active');
            $table->string('contact', 11)->unique('contact')->comment('sales\'s contact number');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_mst_sales_users_2');
            $table->integer('updated_by')->unsigned()->index('FK_mst_sales_users_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_sales');
    }
}
