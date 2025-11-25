<?php

use App\Models\Image;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id(); 

            $table->foreignId('planet_id')->nullable()
            ->constrained('planets')
            ->nullOnDelete(); 

            $table->string('path')->unique();     // ex: images/planets/earth.png
            $table->string('disk')->default('public'); // permet de changer plus tard
            $table->string('role')->nullable(); // ex: cover, thumbnail, gallery...
            $table->timestamps();
        });
    }
};
