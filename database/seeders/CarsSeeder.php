<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cars")->insert([
            [
                "engine_volume" => 1.5,
                "number_of_seats" => 4,
                "body_type" => "hatchback"
            ],
            [
                "engine_volume" => 1.6,
                "number_of_seats" => 5,
                "body_type" => "hatchback"
            ],
            [
                "engine_volume" => 2.9,
                "number_of_seats" => 13,
                "body_type" => "minibus"
            ],
            [
                "engine_volume" => 5.9,
                "number_of_seats" => 2,
                "body_type" => "cabriolet"
            ],
            [
                "engine_volume" => 3.7,
                "number_of_seats" => 5,
                "body_type" => "hatchback"
            ],
        ]);
    }
}
