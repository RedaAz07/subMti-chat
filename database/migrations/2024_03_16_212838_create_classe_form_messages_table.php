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
        Schema::create('classe_form_messages', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('id_formateur');
            $table->unsignedBigInteger('id_classe');


$table->string("contenu")->nullable();
$table->string("file")->nullable();

            $table->foreign('id_formateur')->references('id_formateur')->on('formateurs')->onDelete('cascade');
            $table->foreign('id_classe')->references('id_classe')->on('classes')->onDelete('cascade');








            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_form_messages');
    }
};
