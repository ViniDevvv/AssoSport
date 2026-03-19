<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the existing foreign key using raw SQL
        DB::statement('ALTER TABLE COMPETITION DROP FOREIGN KEY COMPETITION_ibfk_1');
        
        Schema::table('COMPETITION', function (Blueprint $table) {
            $table->string('CLU_ID', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('COMPETITION', function (Blueprint $table) {
            $table->string('CLU_ID', 10)->nullable(false)->change();
        });
    }
};
