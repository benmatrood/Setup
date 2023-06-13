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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('nb_points');
            $table->integer('available')->default(1);
            $table->string('url_image');
            $table->foreignId('restorant_id')->constrained('restorants');
            $table->foreignId('foodcategorie_id')->constrained('foodcategories');
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
        Schema::table('foods', function (Blueprint $table) {
            $table->dropForeign(['restorant_id']);
            $table->dropForeign(['foodcategorie_id']);
        });
        Schema::dropIfExists('foods');
    }
};
