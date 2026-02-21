<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('author_name');
            $table->unsignedTinyInteger('age')->nullable();
            $table->string('stage_principle')->nullable();
            $table->string('quote', 500);
            $table->text('body')->nullable();
            $table->string('video_url')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamps();

            $table->index(['status', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonies');
    }
};
