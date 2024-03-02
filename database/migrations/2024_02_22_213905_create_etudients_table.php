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

            $table->id('id_etudient');

            $table->unsignedBigInteger('id');


            $table->string("nom");
            $table->string("CIN");
            $table->date("dateNaissance");


            $table->string("prenom");
            $table->string("telephone");
            $table->string("addresse");

            $table->timestamps();
            $table->foreign("id")->references("id")->on("utilisateurs")->coscadeOnDelete();




            $table->unsignedBigInteger('id_classe');

            $table->foreign("id_classe")->references("id_classe")->on("classes")->coscadeOnDelete();

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
