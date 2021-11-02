<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('program_settings')){
            return true;
        }
        Schema::create('program_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->nullable();
            $table->integer('expense_id')->nullable();
            $table->integer('program_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('division_id')->nullable();
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
        Schema::dropIfExists('program_settings');
    }
}
