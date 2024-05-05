<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Add this line
            $table->foreign('client_id')->references('id')->on('clients'); // Add this line
            $table->string('numero_projet');
            $table->unsignedBigInteger('createur_id');
            $table->foreign('createur_id')->references('id')->on('users');
            $table->date('date_creation');
            $table->string('nom_projet');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
