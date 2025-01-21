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
        Schema::table('utilisateur_societes', function (Blueprint $table) {
            $table->foreign(['id_societe'], 'utilisateur_societes_ibfk_1')->references(['id_societe'])->on('societes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_user'], 'utilisateur_societes_ibfk_2')->references(['id_user'])->on('utilisateurs')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateur_societes', function (Blueprint $table) {
            $table->dropForeign('utilisateur_societes_ibfk_1');
            $table->dropForeign('utilisateur_societes_ibfk_2');
        });
    }
};
