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
        Schema::create('etudients', function (Blueprint $table) {
            $table->bigInteger("id_etudient");
            $table->primary("id_etudient");
            $table->string("nom");
            $table->string("CIN");
            $table->date("dateNaissance");


            $table->strung("prenom");
            $table->string("telephone");
            $table->string("addresse");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudients');
    }
};
