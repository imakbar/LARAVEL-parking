<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('airport_id')->unsigned()->index()->nullable();

            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();

            $table->float('rate')->nullable();
            $table->boolean('offer')->nullable()->default(0);
            $table->string('offer_type')->nullable();
            $table->float('offer_rate')->nullable();
            $table->float('discount')->nullable();
            $table->float('total')->nullable();

            $table->string('distance')->nullable();
            $table->string('transfer')->nullable();
            $table->integer('parkingtype_id')->unsigned()->index()->nullable();
            $table->integer('cancellation_id')->unsigned()->index()->nullable();

            $table->text('overview')->nullable();
            $table->text('return_procedure')->nullable();
            $table->text('drop_off_procedure')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('important')->nullable();

            $table->boolean('active_overview')->nullable();
            $table->boolean('active_return_procedure')->nullable();
            $table->boolean('active_drop_off_procedure')->nullable();
            $table->boolean('active_terms_and_conditions')->nullable();
            $table->boolean('active_important')->nullable();

            $table->string('meta_tags')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('avatar')->nullable()->default('default.jpg');

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
        Schema::dropIfExists('parkings');
    }
}
