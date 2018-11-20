<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('company_id');
            $table->string('duration');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
