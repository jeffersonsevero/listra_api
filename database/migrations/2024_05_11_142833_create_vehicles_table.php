<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->string('city')->index();
            $table->string('make')->index();
            $table->string('model');
            $table->string('description');
            $table->string('year');
            $table->integer('mileage');
            $table->enum('type_of_exchange', ['manual', 'automatic'])->index();
            $table->string('phone');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
