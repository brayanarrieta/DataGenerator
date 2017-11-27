<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weather_statistics')->insert([
            [
                'timestamp'=>"2017-01-31 00:00:00",
                'max_temperature'=>28.7,
                'min_temperature'=>15.7,
                'sun_hours'=>9
            ],
            [
                'timestamp'=>"2017-02-28 00:00:00",
                'max_temperature'=>29.4,
                'min_temperature'=>15.8,
                'sun_hours'=>9
            ],
            [
                'timestamp'=>"2017-03-31 00:00:00",
                'max_temperature'=>30.6,
                'min_temperature'=>16.4,
                'sun_hours'=>9
            ],
            [
                'timestamp'=>"2017-04-30 00:00:00",
                'max_temperature'=>30.5,
                'min_temperature'=>17.3,
                'sun_hours'=>8
            ],
            [
                'timestamp'=>"2017-05-31 00:00:00",
                'max_temperature'=>29.6,
                'min_temperature'=>17.3,
                'sun_hours'=>5
            ],
            [
                'timestamp'=>"2017-06-30 00:00:00",
                'max_temperature'=>28.6,
                'min_temperature'=>17.1,
                'sun_hours'=>4
            ],
            [
                'timestamp'=>"2017-07-31 00:00:00",
                'max_temperature'=>28.8,
                'min_temperature'=>17,
                'sun_hours'=>4
            ],
            [
                'timestamp'=>"2017-08-31 00:00:00",
                'max_temperature'=>28.7,
                'min_temperature'=>16.6,
                'sun_hours'=>5
            ],
            [
                'timestamp'=>"2017-09-30 00:00:00",
                'max_temperature'=>28.4,
                'min_temperature'=>16.5,
                'sun_hours'=>5
            ],
            [
                'timestamp'=>"2017-10-31 00:00:00",
                'max_temperature'=>27.9,
                'min_temperature'=>16.7,
                'sun_hours'=>5
            ],
            [
                'timestamp'=>"2017-11-30 00:00:00",
                'max_temperature'=>27.4,
                'min_temperature'=>16.6,
                'sun_hours'=>5
            ],
            [
                'timestamp'=>"2017-12-31 00:00:00",
                'max_temperature'=>27.9,
                'min_temperature'=>15.8,
                'sun_hours'=>7
            ]
        ]);
    }
}
