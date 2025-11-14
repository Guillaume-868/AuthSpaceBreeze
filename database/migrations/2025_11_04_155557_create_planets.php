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
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_fr',7);
            $table->string('name_en',7);
            $table->text('description_fr');
            $table->text('description_en');
            $table->string('distance_fr',50);
            $table->string('distance_en',50);
            $table->string('duration_fr',50);
            $table->string('duration_en',50);
            $table->string('subtitle_fr',50);
            $table->string('subtitle_en',50);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
