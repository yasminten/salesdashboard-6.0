<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referral_code', 20)->unique('referral_code')->comment('Unique referral code for reference');
            $table->string('referral_for', 50)->comment('Referral For');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('referral');
    }
}
