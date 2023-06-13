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
        Schema::create('food_wishlist', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('food_id')->constrained('foods');
        });
        // activation de la clef etrangere
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('food_wishlist', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['food_id']);
        });
        Schema::dropIfExists('food_wishlist');
    }
};
