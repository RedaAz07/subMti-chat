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
        Schema::create('formateurs', function (Blueprint $table) {
            $table->id('id_formateur');

            $table->unsignedBigInteger('id');


            $table->string("nom");
            $table->string("prenom");
            $table->string("telephone");
            $table->string("addresse");


            $table->string("CIN");
            $table->date("dateNaissance");





            $table->timestamps();
            $table->foreign("id")->references("id")->on("utilisateurs")->coscadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs');
    }
};
