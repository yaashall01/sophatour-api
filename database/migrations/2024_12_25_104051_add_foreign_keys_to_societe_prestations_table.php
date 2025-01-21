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
        Schema::table('societe_prestations', function (Blueprint $table) {
            $table->foreign(['id_societe'], 'societe_prestations_ibfk_1')->references(['id_societe'])->on('societes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_prestation'], 'societe_prestations_ibfk_2')->references(['id_ligne_devis_prestation'])->on('ligne_devis_prestation')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('societe_prestations', function (Blueprint $table) {
            $table->dropForeign('societe_prestations_ibfk_1');
            $table->dropForeign('societe_prestations_ibfk_2');
        });
    }
};
