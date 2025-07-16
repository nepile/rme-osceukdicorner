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
        Schema::create('enrolled_participants', function (Blueprint $table) {
            $table->uuid('enrolled_id')->primary()->default(DB::raw('UUID()'));
            $table->string('participant_id');
            $table->string('participant_name');
            $table->string('participant_email');
            $table->foreignId('tester_id')->constrained('testers', 'tester_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->time('start');
            $table->time('end')->nullable();
            $table->string('examination')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('therapy')->nullable();
            $table->integer('examination_score')->nullable();
            $table->integer('diagnosis_score')->nullable();
            $table->integer('therapy_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_participants');
    }
};
