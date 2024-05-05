<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        // Fetch distinct countries from the cities table and order them alphabetically
        $countries = City::distinct('country')->orderBy('country')->pluck('country')->toArray();

        // Return the countries as JSON response
        return response()->json($countries);
    }
}
