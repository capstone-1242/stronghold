<?php

namespace App\Models;
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
        Schema::dropIfExists('testimonial_video_user');
        Schema::dropIfExists('resource_user');
        Schema::dropIfExists('memorial_user');
        Schema::dropIfExists('user_video');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('testimonial_video_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestimonialVideo::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('resource_user_table', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resource::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('memorial_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Memorial::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('user_video', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Video::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

    }
};
