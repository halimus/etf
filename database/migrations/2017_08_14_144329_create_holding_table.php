<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holding', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('holding_id');
            $table->string('holding_name', 100)->nullable(false);
            $table->decimal('weight', 5, 2);
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
        Schema::dropIfExists('holding');
    }
}
