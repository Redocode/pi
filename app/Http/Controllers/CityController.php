<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCitiesByCountry($country)
    {
        // Assuming you have a City model with appropriate relationships
        // Replace 'cities' with the actual name of your cities table
        $cities = City::where('country', $country)->orderBy('city')->pluck('city');

        return response()->json($cities);
    }

    public function getCoordinatesByCity($city)
    {
        $city = City::where('city', $city)->first();

        if ($city) {
            return response()->json([
                'latitude' => $city->lat,
                'longitude' => $city->lng
            ]);
        } else {
            return response()->json(['error' => 'City not found'], 404);
        }
    }
}
