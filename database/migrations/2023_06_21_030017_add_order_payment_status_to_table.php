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
        Schema::table('Orders', function (Blueprint $table) {
            //Ajouter la colonne orderPaypent_status à la table Orders
            $table->boolean('orderPaypent_status')->default(0)->after('total_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            //
            $table->dropColumn('orderPaypent_status');
        });
    }
};
