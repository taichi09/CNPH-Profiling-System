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
    Schema::table('personal_information', function (Blueprint $table) {
        // This adds both created_at and updated_at
        $table->timestamps(); 
    });
}

public function down(): void
{
    Schema::table('personal_information', function (Blueprint $table) {
        $table->dropTimestamps();
    });
}
};
