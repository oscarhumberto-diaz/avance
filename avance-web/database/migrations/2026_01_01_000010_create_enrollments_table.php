<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 30);
            $table->unsignedTinyInteger('age')->nullable();
            $table->string('school_name')->nullable();
            $table->string('grade_level', 100)->nullable();
            $table->string('church_name')->nullable();
            $table->unsignedTinyInteger('years_serving')->nullable();
            $table->string('ministry_area')->nullable();
            $table->text('message')->nullable();
            $table->string('status', 20)->default('new');
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['type', 'status']);
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
