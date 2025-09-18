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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'SESSION_INCOME',      // Ingreso por sesión de mentoría
                'APP_COMMISSION',      // Comisión de la app
                'WITHDRAWAL',          // Retiro de fondos
                'REFUND',              // Reembolso
                'MANUAL_ADJUSTMENT'    // Ajuste manual de saldo
            ])->default('SESSION_INCOME');
            $table->decimal('amount', 15, 2);
            $table->foreignId('wallet_id')->nullable()->constrained('wallets')->noActionOnDelete();
            $table->text('admin_notes')->nullable(); // notas internas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
