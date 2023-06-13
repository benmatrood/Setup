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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('points');
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('food_id')->constrained('foods');
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
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['food_id']);
        });
        Schema::dropIfExists('orderdetails');
    }
};
