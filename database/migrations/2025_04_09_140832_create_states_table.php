<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('country_code');
            $table->unsignedBigInteger('country_id');
            $table->string('fips_code')->nullable();  // Ajoute cette ligne pour créer la colonne `fips_code`
            $table->string('flag')->nullable();
            $table->string('iso2')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('name');
            $table->string('wikiDataId')->nullable();
            $table->timestamps();
    
            // Définit la clé étrangère pour `country_id`
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
