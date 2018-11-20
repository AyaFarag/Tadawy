<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 100);
            $table->string('password');
            $table->string('role', 20);
            $table->text('description')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('specialization_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('mobile',30)->nullable();
            $table->string('confirmation_code', 100)->nullable();
            $table->tinyInteger('confirmed_phone')->nullable();
            $table->tinyInteger('partner')->default(0);
            $table->string('api_token',60)->nullable();
            $table->string('device_token',100)->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->string('type')->nullable();
            $table->timestamps();

            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
