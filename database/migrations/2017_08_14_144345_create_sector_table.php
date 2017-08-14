<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('sector_id');
            $table->string('sector_name', 100)->nullable(false);
            $table->decimal('weight', 5, 2);
            $table->integer('order_num')->unsigned()->nullable();
            $table->integer('etf_id')->unsigned();
            
            $table->foreign('etf_id')
                  ->references('etf_id')
                  ->on('etf')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector');
    }
}
