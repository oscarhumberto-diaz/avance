<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->boolean('leaders_only')->default(false);
            $table->foreignId('principle_stage_id')->nullable()->constrained('principle_stages')->nullOnDelete();
            $table->foreignId('principle_id')->nullable()->constrained('principles')->nullOnDelete();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('file_size');
            $table->timestamps();

            $table->index('type');
            $table->index('leaders_only');
            $table->index(['principle_stage_id', 'principle_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
