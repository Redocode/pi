<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'city_ascii',
        'lat',
        'lng',
        'country',
        'iso2',
        'iso3',
        'admin_name',
        'capital',
        'population',
        'csv_id'
    ];
}
