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
        Schema::create('classes', function (Blueprint $table) {
            $table->id('id_classe');

            $table->integer('num_groupe');
            $table->timestamps();





            $table->unsignedBigInteger('id_niveau');


            $table->foreign('id_niveau')->references('id_niveau')->on('niveaux')->cascadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
