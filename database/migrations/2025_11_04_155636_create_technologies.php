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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();  // ✅ PRIMARY KEY automatique
            $table->timestamps();
            $table->string('starships_fr',50);
            $table->string('starships_en',50);
            $table->text('description_fr');
            $table->text('description_en');
            $table->string('subtitle_fr',20);
            $table->string('subtitle_en',20);
            $table->string('launcher_fr',20);
            $table->string('launcher_en',20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologie');
    }
};
