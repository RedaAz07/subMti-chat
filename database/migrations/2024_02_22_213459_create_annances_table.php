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
        Schema::create('annances', function (Blueprint $table) {
            $table->bigInteger('id_annance');
            $table->primary('id_annance');
            $table->bigInteger('id_admin');
            $table->string('contenu');
            $table->string('file');
            $table->timestamps();
            $table->foreign('id_admin')->references('id_admin')->on('admins')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annances');
    }
};
