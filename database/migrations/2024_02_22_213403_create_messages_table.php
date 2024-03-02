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
            $table->id('id_message');
            $table->unsignedBigInteger('id');
            $table->string('contenu');
            $table->string('file');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('utilisateurs')->cascadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }





    public function findprof (){
        $classes = classe::all();

    }
};
