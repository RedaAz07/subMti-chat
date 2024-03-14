<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNiveauxTable extends Migration
{
    public function up()
    {
        Schema::table('niveaux', function (Blueprint $table) {
            // Add foreign key for filiere relationship
            $table->unsignedBigInteger('id_filiere');
            $table->foreign('id_filiere')->references('id_filiere')->on('filieres')->onDelete('cascade');
        });

        // Remove niveaux_filiere pivot table
  
    }

    public function down()
    {
        Schema::table('niveaux', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['id_filiere']);
            // Drop column
            $table->dropColumn('id_filiere');
        });

        // Recreate niveaux_filiere pivot table if needed
        // You might need to add additional logic here to recreate the pivot table
    }
}
