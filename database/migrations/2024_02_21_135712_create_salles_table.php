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
        Schema::disableForeignKeyConstraints();
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('taille');
            $table->string('shema');
            $table->timestamps();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->foreignId('salle_id')->nullable()->constrained('salles')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salles');
    }
};
