<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_meta_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 30)->nullable();
            $table->string('website')->nullable();
            $table->string('license_image')->nullable();
            $table->text('images')->nullable();
            $table->unsignedInteger('company_id')->unique();
            $table->text('social_networks')->nullable();
            $table->text('insurance_companies')->nullable();
            $table->text('lat')->nullable();
            $table->text('lang')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('company_meta_data');
    }
}
