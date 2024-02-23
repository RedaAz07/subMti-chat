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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigInteger('id_message');
            $table->primary('id_message');
            $table->bigInteger('id_utilisateur');
            $table->string('contenu');
            $table->string('file');
            $table->timestamps();
            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->cascadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
