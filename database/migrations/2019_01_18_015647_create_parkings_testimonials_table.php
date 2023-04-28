<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings_testimonials', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned()->index()->nullable();
            $table->string('reference_no')->nullable();
            $table->string('token')->nullable();
            $table->boolean('completed');
            $table->date('completed_at')->nullable();

            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();

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
        Schema::dropIfExists('parkings_testimonials');
    }
}
