<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('look', function (Blueprint $table) {
            $table->increments('id');
            $table->char('height',15);
            $table->char('eyes',15);
            $table->char('hair',15);
            $table->char('weight',15);
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
        Schema::drop('look');
    }
}
