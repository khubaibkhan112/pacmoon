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
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('tweet_id')->nullable();
            $table->longText('content')->nullable();
            $table->string('account')->nullable();
            $table->string('account_url')->nullable();
            $table->string('profile_url')->nullable();
            $table->string('type')->comment('Tweet OR Account')->default('tweet');
            $table->longText('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quests');
    }
};
