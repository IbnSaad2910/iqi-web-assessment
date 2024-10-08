<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('property_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->float('longitude', 10, 8)->nullable();
            $table->float('latitude', 10, 8)->nullable();
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_locations');
    }
}
