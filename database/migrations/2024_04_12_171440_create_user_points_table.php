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
        Schema::create('user_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('quest_id')->nullable();
            $table->unsignedBigInteger('tweet_id')->nullable();
            $table->unsignedBigInteger('for_account')->nullable();
            $table->unsignedBigInteger('total_count')->default(1);
            $table->unsignedBigInteger('user_points')->default(0);
            $table->string('for_account')->default(0);
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->unsignedBigInteger('referred_id')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_points');
    }
};
