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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->string('status', 20)->default('draft');
            $table->smallInteger('pubblication_number')->nullable();
            $table->date('published_at')->nullable();
            $table->string('color', 7);
            $table->string('cover_img', 200);
            $table->string('slug')->unique();            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
