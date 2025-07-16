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
        Schema::create('answer_therapies', function (Blueprint $table) {
            $table->uuid('answertherapy_id')->primary()->default(DB::raw('UUID()'));
            $table->string('participant_id');
            $table->foreignId('tester_id')->constrained('testers', 'tester_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('rslash1')->nullable();
            $table->text('rslash2')->nullable();
            $table->text('rslash3')->nullable();
            $table->text('rslash4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_therapies');
    }
};
