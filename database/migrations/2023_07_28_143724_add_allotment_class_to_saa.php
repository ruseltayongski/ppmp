<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllotmentClassToSaa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saa', function (Blueprint $table) {
            $table->integer('appropriation_id')->nullable();
            $table->integer('allotment_class')->nullable();
            $table->text('level')->nullable();
            $table->integer('expense_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saa', function (Blueprint $table) {
            $table->dropColumn('appropriation_id');
            $table->dropColumn('allotment_class');
            $table->dropColumn('level');
            $table->dropColumn('expense_id');
        });
    }
}
