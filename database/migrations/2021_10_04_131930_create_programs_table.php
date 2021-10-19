<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('programs')){
            return true;
        }
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->text('acronym')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('budget_allotment')->nullable();
            $table->integer('fund_source')->nullable();
            $table->integer('expense_id')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
