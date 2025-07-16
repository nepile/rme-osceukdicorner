<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answer_diagnoses', function (Blueprint $table) {
            $table->uuid('answerdiagnosis_id')->primary()->default(DB::raw('UUID()'));
            $table->string('participant_id');
            $table->foreignId('tester_id')->constrained('testers', 'tester_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('diagnosis1')->nullable();
            $table->text('diagnosis2')->nullable();
            $table->text('diagnosis3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_diagnoses');
    }
};
