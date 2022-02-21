<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaspsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasps_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rasps_session_id');
            $table->integer('rssi')->nullable();
            $table->timestamps();
        });

        Schema::table('rasps_data', function (Blueprint $table) {
            $table->foreign('rasps_session_id')->references('id')->on('data_from_rasps_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rasps_data', function (Blueprint $table) {
           $table->dropForeign('rasps_data_rasps_session_id_foreign');
        });
        Schema::dropIfExists('data_from_rasps');
    }
}
