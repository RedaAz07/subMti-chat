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
        Schema::create('filieres', function (Blueprint $table) {
            $table->id('id_filiere');
            $table->unsignedBigInteger('id_formateur');
            $table->unsignedBigInteger('id_etudient');
            $table->string('nom_filiere');
            $table->timestamps();
            $table->foreign('id_formateur')->references('id_formateur')->on('formateurs')->cascadeOnDelete;
            $table->foreign('id_etudient')->references('id_etudient')->on('etudients')->cascadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
