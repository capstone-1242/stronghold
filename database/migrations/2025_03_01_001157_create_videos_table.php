<?php

use App\Models\User;
use App\Models\Author;
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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: User::class)->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description');
            $table->foreignIdFor(model: Author::class)->constrained()->onDelete('cascade');
            $table->string('author_first_name');
            $table->string('author_last_name');
            $table->text('author_description');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
