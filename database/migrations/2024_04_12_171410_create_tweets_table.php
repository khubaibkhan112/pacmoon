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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('tweet_id');
            $table->longText('content');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_mentioned')->default(false);
            $table->boolean('is_liked')->default(false);
            $table->boolean('is_valid')->default(false);
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('views_count')->default(0);
            $table->integer('share_count')->default(0);
            $table->dateTime('liked_at')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
