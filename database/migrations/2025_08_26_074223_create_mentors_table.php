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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('about_me')->nullable();
            $table->decimal('average_rating', total: 3, places: 2)->default(0.0);
            $table->unsignedInteger('hours_taught')->default(0);
            $table->unsignedInteger('finalized_sessions')->default(0);
            $table->decimal('latitude_aprox', total: 24, places: 20)->default(0.0);
            $table->decimal('longitude_aprox', total: 24, places: 20)->default(0.0);

            $table->foreignId('user_id')->constrained(table: 'users')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
