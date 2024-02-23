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
            $table->bigInteger("id_utilisateur");
            $table->primary("id_utilisateur");

            $table->bigInteger('id_admin');
            $table->bigInteger('id_formateur');
            $table->bigInteger('id_etudient');



            $table->string("email");
            $table->string("password");
            $table->string("newPassword");
            $table->string("type");


            $table->foreign("id_admin")->references("id_admin")->on("admins")->coscadeOnDelete();
            $table->foreign("id_formateur")->references("id_formateur")->on("formateurs")->coscadeOnDelete();
            $table->foreign("id_etudient")->references("id_etudient")->on("etudients")->coscadeOnDelete();


            $table->timestamps();
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
