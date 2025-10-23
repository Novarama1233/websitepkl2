<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'finished_at')) {
                $table->timestamp('finished_at')->nullable();
            }

            if (!Schema::hasColumn('bookings', 'warranty_expires_at')) {
                $table->timestamp('warranty_expires_at')->nullable();
            }

            if (!Schema::hasColumn('bookings', 'warranty_code')) {
                $table->string('warranty_code')->unique()->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $columns = ['finished_at', 'warranty_expires_at', 'warranty_code'];

            foreach ($columns as $column) {
                if (Schema::hasColumn('bookings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};