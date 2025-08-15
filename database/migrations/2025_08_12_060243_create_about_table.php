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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->text('subjudul');
            $table->text('deskripsi_1');
            $table->text('deskripsi_2');
            $table->text('kelebihan_1');
            $table->text('kelebihan_2');
            $table->text('kelebihan_3');
            $table->text('kelebihan_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
