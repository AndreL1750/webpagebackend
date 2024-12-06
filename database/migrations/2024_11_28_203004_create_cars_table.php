<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("Year");
            $table->string("Brand");
            $table->string("Model");
            $table->string("SubModel");
            $table->string("Version");
            $table->string("Doors");
            $table->string("Color");
            $table->string("Traction");
            $table->string("CubicCapacity");
            $table->string("Power");
            $table->string("Gearbox");
            $table->string("Fuel");
            $table->string("Segment");
            $table->string("ColorType");
            $table->string("Class");
            $table->string("Plate");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
