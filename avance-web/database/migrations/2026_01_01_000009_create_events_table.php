<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('visibility', 20)->default('public');
            $table->timestamps();

            $table->index('starts_at');
            $table->index('visibility');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
