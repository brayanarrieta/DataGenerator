<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateWeatherStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('timestamp')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->float('max_temperature')->default('0');
            $table->float('min_temperature')->default('0');
            $table->integer('sun_hours')->default('0');
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
        Schema::dropIfExists('weather_statistics');
    }
}
