<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rf_id')->nullable();
            $table->integer('expense_from')->nullable();
            $table->integer('expense_to')->nullable();
            $table->integer('amount')->nullable();
            $table->text('userid')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('section_id')->nullable();
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
        Schema::dropIfExists('realignments');
    }
}
