<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_parkings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('parking_id')->unsigned()->index()->nullable();

            $table->boolean('status')->nullable();

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->date('created_date')->nullable();
            $table->time('created_time')->nullable();
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->date('updated_date')->nullable();
            $table->time('updated_time')->nullable();

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
        Schema::dropIfExists('user_parkings');
    }
}
