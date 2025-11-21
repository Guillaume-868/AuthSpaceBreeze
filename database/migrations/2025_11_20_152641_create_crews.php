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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();  // ✅ PRIMARY KEY automatique

             // Le crew appartient à une image → crew.image_id pointe vers images.id
             $table->foreignId('image_id')
             ->constrained('images')
             ->cascadeOnDelete();
             
            $table->timestamps();
            $table->string('fonction_fr',50);
            $table->string('fonction_en',50);
            $table->text('description_fr');
            $table->text('description_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crew');
    }
};
