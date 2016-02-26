<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('video_id')->unsigned()->index();
            $table->integer('voter_id')->unsigned()->index();
            $table->integer('vote')->unsigned()->index();
            $table->timestamps();

            $table->foreign('video_id')
                  ->references('id')
                  ->on('videos')
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
        Schema::drop('votes');
    }
    
}
