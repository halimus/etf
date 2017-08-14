<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('country_id');
            $table->string('country_name', 100)->nullable(false);
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
        Schema::dropIfExists('country');
    }
}
