<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('h_name');//追記
            $table->string('h_location')->nullable();//追記
            $table->integer('h_latitude')->nullable();//追記
            $table->string('h_longtitude')->nullable();//追記
            $table->string('h_link')->nullable();//追記
            $table->integer('h_price')->nullable();//追記
            $table->string('h_img')->nullable();//追記
         
          
            $table->text('comment')->nullable();//追記！！！
            $table->integer('favorite_id')->nullable();//追記
            $table->integer('wishlist_id')->nullable();//追記
            $table->integer('stars_id')->nullable();//追記
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
        Schema::dropIfExists('hotels');
    }
}
