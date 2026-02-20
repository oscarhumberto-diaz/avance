<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('principle_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('principle_id')->constrained('principles')->cascadeOnDelete();
            $table->string('title');
            $table->string('summary')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['principle_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('principle_lessons');
    }
};
