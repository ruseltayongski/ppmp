<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeTo extends Migration
{

    public function up()
    {
        if(Schema::hasTable('charge_to')){
            return true;
        }
        Schema::create('charge_to', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('division')->nullable();
            $table->text('section')->nullable();
            $table->text('description')->nullable();
            $table->text('beginning_balance')->nullable();
            $table->text('remaining_balance')->nullable();
            $table->date('datein')->nullable();
            $table->text('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('charge_to');
    }
}
