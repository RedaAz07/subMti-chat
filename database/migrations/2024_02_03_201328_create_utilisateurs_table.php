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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("etud_id");
            $table->string("email")->unique();
            $table->string("password")->unique();
            $table->string("newPassword");

            $table->timestamps();

            $table->foreign("etud_id")->references("id")->on("etudients_infos")->cascadeOndelet();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
