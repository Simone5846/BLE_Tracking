<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFromRaspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_from_rasps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->integer('rssi')->nullable();
            $table->timestamps();
        });

        Schema::table('data_from_rasps', function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('data_from_rasps_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_from_rasps', function (Blueprint $table) {
           $table->dropForeign('data_from_rasps_device_id_foreign');
        });
        Schema::dropIfExists('data_from_rasps');
    }
}
