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
        Schema::table('devis_paiements', function (Blueprint $table) {
            $table->foreign(['devis_mode_paiements'], 'devis_paiements_ibfk_1')->references(['id_devis_mode_paiements'])->on('devis_mode_paiements')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['client_devis_client'], 'devis_paiements_ibfk_2')->references(['id_client_devis'])->on('client_devis_client')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['document'], 'devis_paiements_ibfk_3')->references(['document_id'])->on('document')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devis_paiements', function (Blueprint $table) {
            $table->dropForeign('devis_paiements_ibfk_1');
            $table->dropForeign('devis_paiements_ibfk_2');
            $table->dropForeign('devis_paiements_ibfk_3');
        });
    }
};
