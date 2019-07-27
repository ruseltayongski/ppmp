<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('qty')){
            return true;
        }
        Schema::create('qty', function (Blueprint $table) {
            $table->increments('id');
            $table->text('item_id')->nullable();
            $table->text('unique_id','255')->nullable();
            $table->primary(array('unique_id'));

            $table->text('created_by')->nullable();
            $table->text('division')->nullable();
            $table->text('section')->nullable();
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
        Schema::dropIfExists('qty');
    }
}
