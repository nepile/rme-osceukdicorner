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
            $table->text('rslash1');
            $table->text('rslash2');
            $table->text('rslash3');
            $table->text('rslash4');
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
