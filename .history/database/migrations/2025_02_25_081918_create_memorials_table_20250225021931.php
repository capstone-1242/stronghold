<?php

use App\Models\memorial_image;
use App\Models\tag;
use App\Models\User;
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
        Schema::create('memorials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: User::class);
            $table->foreignIdFor(Memorial_image::class);
            $table->foreignIdFor(Tag::class);
            $table->string('name');
            $table->text('biography');
            $table->year('birth_year')->nullable();
            $table->year('death_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorials');
    }
};
