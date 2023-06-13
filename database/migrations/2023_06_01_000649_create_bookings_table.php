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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('house_id')->constrained('houses');
            $table->foreignId('bookingstatu_id')->constrained('bookingstatus');
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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['house_id']);
            $table->dropForeign(['bookingstatu_id']);
        });
        Schema::dropIfExists('bookings');
    }
};
