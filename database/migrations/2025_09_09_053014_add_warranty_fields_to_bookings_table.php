<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('warranty_expires_at')->nullable();
            $table->string('warranty_code')->unique()->nullable();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['finished_at', 'warranty_expires_at', 'warranty_code']);
        });
    }
};
