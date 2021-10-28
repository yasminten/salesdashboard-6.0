<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_rules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ruletype_id')->index('FK_trn_rules_mst_rules_1')->comment('links to unique record if of mst_rules');
            $table->integer('min_value');
            $table->integer('max_value');
            $table->integer('max_claim');
            $table->float('percentage');
            $table->date('start_date')->comment('start date of rules');
            $table->date('end_date')->comment('end date of rules');
            $table->boolean('status')->comment('0 = expired, 1 = active');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index('FK_trn_rules_mst_staff_2');
            $table->integer('updated_by')->unsigned()->index('FK_trn_rules_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trn_rules');
    }
}
