<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMstMinClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_minclaims', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->integer('member_id')->index('FK_mst_min_claims_mst_members_1')->comment('links to unique record id of mst_members');
            $table->integer('min_claim')->comment('Minimum amount to claim');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_mst_min_claims_users_1');
            $table->integer('updated_by')->unsigned()->nullable()->index('FK_mst_min_claims_users_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_minclaims');
    }
}
