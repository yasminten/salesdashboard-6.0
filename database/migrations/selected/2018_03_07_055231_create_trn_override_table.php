<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTrnOverrideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_override', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('revenue_id')->index('FK_trn_override_trn_revenues_1')->comment('links to unique record id of trn_revenues');
            $table->integer('override')->comment('amount override gained');
            $table->integer('month')->comment('Month Generate');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_override_users_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_override_users_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_override');
    }
}
