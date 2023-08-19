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
        Schema::table('restorants', function (Blueprint $table) {
            ////Ajouter la colonne restorant_status à la table restorants
            $table->string('restorant_status')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restorants', function (Blueprint $table) {
            //
            $table->dropColumn('restorant_status');
        });
    }
};
