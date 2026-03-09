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
        Schema::create('social_media_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // facebook, instagram, twitter, linkedin, youtube, tiktok
            $table->string('handle'); // @username
            $table->string('url'); // profile URL
            $table->text('description')->nullable();
            $table->integer('followers')->default(0);
            $table->integer('posts')->default(0);
            $table->decimal('engagement_rate', 5, 2)->default(0.00); // percentage
            $table->string('last_post_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['platform', 'is_active']);
            $table->index('platform');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_accounts');
    }
};
