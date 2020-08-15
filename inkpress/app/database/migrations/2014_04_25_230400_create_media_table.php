<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function(Blueprint $table)
        {
            $table->increments('id');
            // alt tag text
            $table->string('alt')->nullable();
            // captioning
            $table->string('caption')->nullable();
            // the filename
            $table->string('filename');
            // path to file
            $table->string('path');
            // title tag text
            $table->string('title')->nullable();
            // the type of media (image, video, audio, pdf)
            $table->string('type')->nullable();
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
        Schema::drop('media', function(Blueprint $table)
        {
            //
        });
    }

}
