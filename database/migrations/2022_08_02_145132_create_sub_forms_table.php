<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->nullable();
            $table->integer('item_daily_id')->nullable();
            $table->text('unique_id')->nullable();
            $table->integer('expense_id')->nullable();
            $table->text('userid')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->text('tranche')->nullable();
            $table->text('code')->nullable();
            $table->text('description')->nullable();
            $table->integer('qty')->nullable();
            $table->text('unit_measurement')->nullable();
            $table->text('unit_cost')->nullable();
            $table->text('estimated_budget')->nullable();
            $table->text('mode_procurement')->nullable();
            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('mar')->nullable();
            $table->integer('apr')->nullable();
            $table->integer('may')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('jul')->nullable();
            $table->integer('aug')->nullable();
            $table->integer('sep')->nullable();
            $table->integer('oct')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('dece')->nullable();
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
        Schema::dropIfExists('sub_forms');
    }
}
