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
        Schema::create('COMPETITION', function (Blueprint $table) {
            $table->string('COM_ID', 10)->primary();
            $table->string('COM_NOM', 50);
            $table->date('COM_DATE')->nullable();
            $table->string('DIS_ID', 10);

            $table->foreign('DIS_ID')->references('DIS_ID')->on('DISCIPLINE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('COMPETITION');
    }
};
