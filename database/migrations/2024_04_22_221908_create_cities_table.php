<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            // $table->id(); // Remove or comment out this line
            $table->string('city');
            $table->string('city_ascii');
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->string('country');
            $table->string('iso2', 2);
            $table->string('iso3', 3);
            $table->string('admin_name');
            $table->string('capital');
            $table->integer('population');
            $table->bigInteger('csv_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
