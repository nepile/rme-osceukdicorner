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
        Schema::create('exam_dates', function (Blueprint $table) {
            $table->id('date_id');
            $table->foreignUuid('session_id')->nullable()->constrained('exam_sessions', 'session_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_dates');
    }
};
