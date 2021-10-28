<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_projects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->index('FK_trn_projects_mst_members_1')->comment('links to unique record id of mst_members');
            $table->integer('service_id')->index('FK_trn_projects_mst_service_2')->comment('links to unique record id of mst_services');
            $table->integer('servicedetail_id')->index('FK_trn_projects_trn_servicedetail')->comment('links to unique record id of trn_service_details');
            $table->integer('project_type')->comment('project type');
            $table->string('project_code', 50)->comment('Unique member id for reference');
            $table->date('order_date')->comment('order date of projects');
            $table->boolean('status')->comment('0 = expired, 1 = ongoing, 2 = renewed, 3 = canceled');
            $table->boolean('is_renewal')->comment('0= false , 1=true');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_projects_mst_staff_3');
            $table->integer('updated_by')->unsigned()->index('FK_trn_projects_mst_staff_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_projects');

    }
}
