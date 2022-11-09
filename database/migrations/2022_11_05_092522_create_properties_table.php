<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->string('postcode')->nullable();
            $table->text('description');
            $table->string('address');
            $table->string('image_full');
            $table->string('image_thumbnail');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->integer('num_bedrooms');
            $table->integer('num_bathrooms');
            $table->double('price');
            $table->enum('type', ['sale', 'rent']);
            $table->foreignIdFor(\App\Models\PropertyType::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
