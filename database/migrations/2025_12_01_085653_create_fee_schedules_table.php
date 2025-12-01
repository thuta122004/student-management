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
        Schema::create('fee_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_level_id')->constrained();
            $table->foreignId('exam_cycle_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->decimal('base_fee', 10, 2);
            $table->decimal('min_upfront_percent', 5, 2);
            $table->decimal('discount_percent', 5, 2);
            $table->text('notes');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_schedules');
    }
};
