<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('item')){
            return true;
        }
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('expense_id')->nullable();
            $table->text('tranche')->nullable();
            $table->text('code')->nullable();
            $table->text('description')->nullable();
            $table->text('qty')->nullable();
            $table->text('unit_cost')->nullable();
            $table->text('estimated_budget')->nullable();
            $table->text('mode_procurement')->nullable();
            $table->text('jan')->nullable();
            $table->text('feb')->nullable();
            $table->text('mar')->nullable();
            $table->text('apr')->nullable();
            $table->text('may')->nullable();
            $table->text('jun')->nullable();
            $table->text('jul')->nullable();
            $table->text('aug')->nullable();
            $table->text('sep')->nullable();
            $table->text('oct')->nullable();
            $table->text('nov')->nullable();
            $table->text('dec')->nullable();
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
        Schema::dropIfExists('item');
    }
}
