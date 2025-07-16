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
        Schema::create('answer_examinations', function (Blueprint $table) {
            $table->uuid('answerexamination_id')->primary()->default(DB::raw('UUID()'));
            $table->string('participant_id');
            $table->foreignUuid('subquestion_id')->constrained('sub_questions', 'subquestion_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('answer')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_examinations');
    }
};
