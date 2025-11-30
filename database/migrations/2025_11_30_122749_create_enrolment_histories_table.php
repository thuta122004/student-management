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
        Schema::create('enrolment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrolment_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('old_status', ['PENDING', 'ELIGIBLE', 'INELIGIBLE', 'WAITLISTED', 'APPROVED', 'ENROLLED', 'REJECTED', 'WITHDRAWN', 'CANCELLED', 'COMPLETED']);
            $table->enum('new_status', ['PENDING', 'ELIGIBLE', 'INELIGIBLE', 'WAITLISTED', 'APPROVED', 'ENROLLED', 'REJECTED', 'WITHDRAWN', 'CANCELLED', 'COMPLETED']);
            $table->dateTime('changed_at');
            $table->text('reason');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolment_histories');
    }
};
