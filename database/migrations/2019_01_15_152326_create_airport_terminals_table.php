<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_terminals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('airport_id')->unsigned()->index()->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();

            $table->boolean('status')->nullable();

            $table->integer('created_by')->unsigned()->index();
            $table->date('created_date');
            $table->time('created_time');
            $table->integer('updated_by')->unsigned()->index();
            $table->date('updated_date');
            $table->time('updated_time');

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
        Schema::dropIfExists('airport_terminals');
    }
}
