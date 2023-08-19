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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('sector');
            $table->string('town');
            $table->integer('certification')->default(0);
            $table->integer('price');
            $table->integer('longitude');
            $table->integer('latitude');
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('image8')->nullable();
            $table->string('image9')->nullable();
            $table->string('image10')->nullable();
            $table->string('image11')->nullable();
            $table->string('image12')->nullable();
            $table->string('image13')->nullable();
            $table->string('image14')->nullable();
            $table->string('image15')->nullable();
            $table->string('image16')->nullable();
            $table->string('image17')->nullable();
            $table->string('image18')->nullable();
            $table->string('image19')->nullable();
            $table->string('image20')->nullable();
            $table->string('video')->nullable();
            $table->foreignId('housetype_id')->constrained('housetypes');
            $table->foreignId('housecategory_id')->constrained('housecategories');
            $table->foreignId('equipment_id')->constrained('equipments');
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
        Schema::table('houses', function (Blueprint $table) {
            $table->dropForeign(['housetype_id']);
            $table->dropForeign(['housecategory_id']);
            $table->dropForeign(['equipment_id']);
            $table->dropForeign(['companie_id']);
        });
        Schema::dropIfExists('houses');
    }
};
