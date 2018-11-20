<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePhoneFromCompanyMetaData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_meta_data', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_meta_data', function (Blueprint $table) {
            $table->string('phone', 30)->nullable();
        });
    }
}
