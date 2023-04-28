<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('transaction_id')->nullable();
            $table->float('amount')->unsigned()->nullable();
            $table->integer('payment_status')->unsigned()->default(0);
            $table->softDeletes();


            $table->string('reference_no')->nullable();

            $table->date('drop_off_date')->nullable();
            $table->string('drop_off_hour')->nullable();
            $table->string('drop_off_minute')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('arrival_hour')->nullable();
            $table->string('arrival_minute')->nullable();
            $table->integer('days')->nullable();

            $table->integer('airport_id')->unsigned()->index()->nullable();
            $table->integer('mybookparking_id')->unsigned()->index()->nullable();
            $table->string('email')->nullable();
            $table->integer('title_id')->unsigned()->index()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('post_code')->nullable();

            $table->boolean('know_travel_detail')->nullable();
            $table->integer('departterminal_id')->unsigned()->index()->nullable();
            $table->string('outbound_flight')->nullable();
            $table->integer('arrivalterminal_id')->unsigned()->index()->nullable();
            $table->string('inbound_flight')->nullable();

            $table->boolean('know_vehical_detail')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('colour')->nullable();
            $table->string('registration')->nullable();

            $table->boolean('accept_terms_condition')->nullable();

            $table->string('order_status')->nullable();
            $table->text('taken_remarks')->nullable();
            $table->text('completed_remarks')->nullable();

            $table->string('status')->default('unpaid')->nullable();


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
        Schema::dropIfExists('orders');
    }
}
