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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_level_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['PENDING', 'ELIGIBLE', 'INELIGIBLE', 'WAITLISTED', 'APPROVED', 'ENROLLED', 'REJECTED', 'WITHDRAWN', 'CANCELLED', 'COMPLETED']);
            $table->integer('waitlist_position');
            $table->text('remark')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolments');
    }
};
