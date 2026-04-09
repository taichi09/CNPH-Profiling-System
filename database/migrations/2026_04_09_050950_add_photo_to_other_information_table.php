<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('other_information', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('date_resigned');
        });
    }

    public function down(): void
    {
        Schema::table('other_information', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};