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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained(table: 'mentors')->noActionOnDelete();
            $table->foreignId('student_id')->constrained(table: 'students')->noActionOnDelete();

            $table->timestamp('scheduled_at');
            $table->string('status')->default('scheduled'); // e.g., scheduled, completed, canceled

            $table->integer('duration')->default(1);
            $table->boolean('mentor_present')->default(false);
            $table->boolean('student_present')->default(false);

            $table->text('notes')->nullable();

            $table->foreignId('mentorship_id')->constrained(table: 'mentorships')->noActionOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
