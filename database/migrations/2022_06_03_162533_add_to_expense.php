<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expense', function (Blueprint $table) {
            $table->text('fundSource_title')->nullable();
            $table->integer('fundSource_id');
            $table->string('beginning_bal')->nullable();
            $table->string('remaining_bal')->nullable();
            $table->string('utilized')->nullable();
            $table->string('realigned')->nullable();
            $table->integer('yearly_ref_id');
            $table->integer('section_id');
            $table->integer('program_id')->nullable();
            $table->integer('budget_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expense', function (Blueprint $table) {
            $table->dropColumn('yearly_ref_id','realigned','utilized','remaining_bal','beginning_bal','fundSource_id','fundSource_title','section_id','program_id','budget_id');
        });
    }
}
