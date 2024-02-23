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
        Schema::create('groupes', function (Blueprint $table) {
            $table->bigInteger('id_groupe');
            $table->primary('id_groupe');
            $table->bigInteger('id_filiere');
            $table->integer('num_groupe');
            $table->timestamps();
            $table->foreign('id_filiere')->references('id_filiere')->on('filieres')->cascadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupes');
    }
};
