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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('nrc')->unique();
            $table->date('dob');
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->string('phone');
            $table->string('email');
            $table->string('edu_mail')->nullable()->unique();
            $table->text('address');
            $table->string('profile');
            $table->text('education');
            $table->text('occupation');
            $table->string('guardian_name');
            $table->string('relationship');
            $table->string('guardian_phone');
            $table->string('guardian_email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
