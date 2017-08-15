<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etf', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('etf_id');
            $table->string('etf_name', 25)->nullable(false);
            $table->string('description', 255)->nullable();
            $table->date('etf_date')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
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
        Schema::dropIfExists('etf');
    }
}
