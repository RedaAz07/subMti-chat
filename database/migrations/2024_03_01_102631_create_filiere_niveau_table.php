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
        Schema::create('filiere_niveau', function (Blueprint $table) {





            $table->unsignedBigInteger('id_filiere');
            $table->unsignedBigInteger('id_niveau');
            // Define other columns if needed

            // Define composite primary key
            $table->primary(['id_filiere', 'id_niveau']);

            // Define foreign keys
            $table->foreign('id_filiere')->references('id_filiere')->on('filieres')->onDelete('cascade');
            $table->foreign('id_niveau')->references('id_niveau')->on('niveaux')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere_niveau');
    }
};
