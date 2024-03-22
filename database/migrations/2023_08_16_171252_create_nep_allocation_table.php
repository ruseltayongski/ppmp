<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNepAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nep_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nep_id');
            $table->integer('section_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->string('beginning_bal')->nullable();
            $table->string('remaining_bal')->nullable();
            $table->string('utilized')->nullable();
            $table->string('realigned')->nullable();
            $table->text('level')->nullable();
            $table->integer('expense_id')->nullable();
            $table->text('status')->nullable();
            $table->integer('appropriation_id')->nullable();
            $table->integer('allotment_class')->nullable();
            $table->integer('yearly_ref_id')->nullable();
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
        Schema::dropIfExists('nep_allocation');
    }
}
