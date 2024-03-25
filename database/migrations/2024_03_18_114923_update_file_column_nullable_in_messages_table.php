<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFileColumnNullableInMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('file')->nullable()->change();
            $table->string('contenu')->nullable()->change(); // Making the 'file' column nullable
             // Making the 'file' column nullable
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('file')->nullable(false)->change();
            $table->string('contenu')->nullable(false)->change(); // Reverting the change (if needed)
             // Reverting the change (if needed)
        });
    }
}
