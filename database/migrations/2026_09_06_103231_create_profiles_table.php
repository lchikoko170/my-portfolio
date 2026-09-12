<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            $table->text('bio')->nullable();
            $table->longText('about')->nullable();

            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('profile_image')->nullable();
            $table->string('cv_file')->nullable();

            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};