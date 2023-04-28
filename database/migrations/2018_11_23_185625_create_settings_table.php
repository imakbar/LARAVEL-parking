<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_verification_by')->nullable()->default('email'); //by admin, email, force
            $table->string('blog_comments_approved_by')->nullable()->default('admin'); //by admin, direct
            $table->string('title')->nullable()->default('title');
            $table->string('slogan')->nullable()->default('slogan');
            $table->string('logo_light')->nullable()->default('logo-light.png');
            $table->string('logo_dark')->nullable()->default('logo-dark.png');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('orders_email')->nullable();
            $table->string('office_timing')->nullable();
            $table->string('address')->nullable();
            $table->text('copy_rights')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
