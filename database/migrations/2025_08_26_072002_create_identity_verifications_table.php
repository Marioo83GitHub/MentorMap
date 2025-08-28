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
        Schema::create('identity_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('front_id_card_path');
            $table->string('back_id_card_path');
            $table->string('person_photo_path');
            $table->dateTime('submit_date');
            $table->string('reject_reasons')->nullable();

            $table->boolean('verified')->default(false);

            $table->foreignId('user_id')->constrained(table: 'users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity_verifications');
    }
};
