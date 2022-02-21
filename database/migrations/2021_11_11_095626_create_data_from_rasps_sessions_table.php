<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFromRaspsSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_from_rasps_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->dateTime('started_at');
            $table->dateTime('ended_at')->nullable();
            $table->timestamps();
        });

        Schema::table('data_from_rasps_sessions', function (Blueprint $table) {
            $table->foreign('device_id')->references('id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_from_rasps_sessions', function (Blueprint $table) {
           $table->dropForeign('data_from_rasps_device_id_foreign');
        });
        Schema::dropIfExists('data_from_rasps_sessions');
    }
}
