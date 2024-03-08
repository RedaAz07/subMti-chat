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
        Schema::create('messageClasses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_etudient');
            $table->unsignedBigInteger('id_classe');


$table->string("contenu")->nullable();
$table->string("file")->nullable();

            $table->foreign('id_etudient')->references('id_etudient')->on('etudients')->onDelete('cascade');
            $table->foreign('id_classe')->references('id_classe')->on('classes')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messageClasses');
    }
};
