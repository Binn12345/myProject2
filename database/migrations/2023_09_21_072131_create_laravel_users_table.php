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
        Schema::create('laravel_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->name('string')->nullable();
            $table->user_type('string')->nullable();
            $table->user_key();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravel_users');
    }
};
