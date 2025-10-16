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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relasi ke User
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Relasi ke Service (nullable biar kalau service dihapus booking tetap ada)
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();

            // Informasi booking
            $table->string('title');
            $table->date('date');
            $table->string('status')->default('pending');

            // Tambahan untuk garansi
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('warranty_expires_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
