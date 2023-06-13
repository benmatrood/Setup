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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('objet');
            $table->texte('message');
            $table->foreignId('statusrequest_id')->constrained('requeststatus');
            $table->foreignId('restorant_id')->constrained('restorants');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('companie_id')->constrained('companies');
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
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['restorant_id']);
            $table->dropForeign(['companie_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['statusrequest_id']);
        });
        Schema::dropIfExists('requests');
    }
};
