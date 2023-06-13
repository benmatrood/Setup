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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->integer('points');
            $table->integer('status');
            $table->date('date');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('booking_id')->constrained('bookings');
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
        Schema::table('billings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['booking_id']);
        });
        Schema::dropIfExists('billings');
    }
};
