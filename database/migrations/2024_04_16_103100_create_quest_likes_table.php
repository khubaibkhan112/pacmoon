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
        Schema::create('quest_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('quest_id');
            $table->unsignedBigInteger('tweeter_id');
            $table->timestamps();
            $table->foreign('tweeter_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quest_likes');
    }
};
