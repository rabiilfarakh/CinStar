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
        Schema::create('chaises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salle_id');
            $table->enum('status', ["available", "reserved"])->default("available");
            $table->enum('display', ["block", "none"])->default('block');
            $table->enum('type', ["vip", "normale"])->default("normale");
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chaises');
    }
};
