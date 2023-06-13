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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->integer('total_points');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('food_id')->constrained('foods');
            $table->foreignId('restorant_id')->constrained('restorants');
            $table->foreignId('orderstatus_id')->constrained('orderstatus');
            $table->timestamps();
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['restorant_id']);
            $table->dropForeign(['orderstatus_id']);
            $table->dropForeign(['food_id']);
        });
        Schema::dropIfExists('orders');
    }
};
