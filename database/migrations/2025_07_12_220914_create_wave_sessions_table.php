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
        Schema::create('wave_sessions', function (Blueprint $table) {
            $table->id('wave_id');
            $table->foreignUuid('session_id')->nullable()->constrained('exam_sessions', 'session_id')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->string('name');
            $table->time('start');
            $table->time('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wave_sessions');
    }
};
