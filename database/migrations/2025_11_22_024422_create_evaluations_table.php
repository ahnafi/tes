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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamp('submitted_at')->nullable();

            // Section 1. 5 pertanyaan
            for ($q = 1; $q <= 5; $q++) {
                $table->unsignedTinyInteger("s1_q{$q}")->default(1);
            }

            // Section 2. 5 pertanyaan
            for ($q = 1; $q <= 5; $q++) {
                $table->unsignedTinyInteger("s2_q{$q}")->default(1);
            }

            // Section 3. 5 pertanyaan
            for ($q = 1; $q <= 5; $q++) {
                $table->unsignedTinyInteger("s3_q{$q}")->default(1);
            }

            // Section 4. 5 pertanyaan
            for ($q = 1; $q <= 5; $q++) {
                $table->unsignedTinyInteger("s4_q{$q}")->default(1);
            }

            // Section 5. 5 pertanyaan
            for ($q = 1; $q <= 5; $q++) {
                $table->unsignedTinyInteger("s5_q{$q}")->default(1);
            }

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
