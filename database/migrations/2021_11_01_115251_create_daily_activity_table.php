<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name',255);
            $table->string('building',255);
            $table->string('floor',11);
            $table->string('address',255);
            $table->string('phone',11);
            $table->string('pic',255);
            $table->string('created_by',50);
            $table->string('remarks',255);
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
        Schema::dropIfExists('daily_activity');
    }
}
