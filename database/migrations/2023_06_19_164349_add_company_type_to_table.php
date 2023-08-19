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
        Schema::table('companies', function (Blueprint $table) {
            //Ajouter la colonne company_type à la table companies
            $table->string('company_type')->after('email');
            $table->string('company_status')->after('company_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            //
            $table->dropColumn('company_type');
            $table->dropColumn('company_status');
        });
    }
};
