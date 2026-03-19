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
        // Drop foreign key for CLU_ID_LOCAL if it exists
        try {
            DB::statement('ALTER TABLE COMPETITION DROP FOREIGN KEY COMPETITION_ibfk_3');
        } catch (\Exception $e) {
            // Foreign key might not exist
        }
        
        Schema::table('COMPETITION', function (Blueprint $table) {
            // Make CLU_ID_LOCAL nullable
            $table->string('CLU_ID_LOCAL', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('COMPETITION', function (Blueprint $table) {
            $table->string('CLU_ID_LOCAL', 10)->nullable(false)->change();
        });
    }
};
