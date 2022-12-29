<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('budget')){
            return true;
        }
        Schema::create('budget', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fundSource_id');
            $table->text('fundSource_title');
            $table->integer('expense_id')->nullable();
            $table->integer('program_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('appropriation_id');
            $table->integer('allotment_id');
            $table->string('beginning_bal')->nullable();
            $table->string('remaining_bal')->nullable();
            $table->string('utilized')->nullable();
            $table->string('realigned')->nullable();
            $table->integer('yearly_ref_id');
            $table->text('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('budget');
    }
}
