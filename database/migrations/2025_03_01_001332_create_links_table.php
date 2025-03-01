<?php

use App\Models\Video;
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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
 		$table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->foreignIdFor(Video::class)->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
