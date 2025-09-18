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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rating'); // Calificación del 1 al 5
            $table->text('comment')->nullable(); // Comentario opcional
            $table->foreignId('mentorship_id')->constrained('mentorships')->noActionOnDelete();
            $table->foreignId('student_id')->constrained('students')->noActionOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
