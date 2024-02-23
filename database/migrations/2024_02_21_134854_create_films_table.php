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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->enum('statut', ['1', '0'])->default('1');
            $table->string('title');
            $table->string('year');
            $table->string('runtime');
            $table->string('released');
            $table->string('Awards');
            $table->string('genre');
            $table->string('acteur');
            $table->string('date');
            $table->text('Poster');
            $table->text('plot');
            $table->decimal('rating', 5, 2)->change();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
