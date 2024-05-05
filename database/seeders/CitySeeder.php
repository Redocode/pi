<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen(storage_path('app/cities.csv'), 'r');

        if ($csvFile !== false) {
            $header = fgetcsv($csvFile); // Skip the header

            while (($data = fgetcsv($csvFile)) !== false) {
                DB::table('cities')->insert([
                    'city' => $data[0],
                    'city_ascii' => $data[1],
                    'lat' => $data[2],
                    'lng' => $data[3],
                    'country' => $data[4],
                    'iso2' => $data[5],
                    'iso3' => $data[6],
                    'admin_name' => $data[7],
                    'capital' => $data[8],
                    'population' => $data[9],
                    'csv_id' => $data[10] // Add the id column
                ]);
            }

            fclose($csvFile);
        }
    }
}
