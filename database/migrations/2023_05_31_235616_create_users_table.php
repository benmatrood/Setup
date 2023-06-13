<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->char('sexe_user'); // M ou F
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->integer('nb_points')->default(0);
            $table->foreignId('restorant_id')->constrained('restorants');
            $table->foreignId('companie_id')->constrained('companies');
            $table->rememberToken();
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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['restorant_id']);
            $table->dropForeign(['companie_id']);
        });
        Schema::dropIfExists('users');
    }
};
