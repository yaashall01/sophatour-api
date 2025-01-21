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
        Schema::table('dernier_numero_devis_facture', function (Blueprint $table) {
            $table->foreign(['societe_id'], 'fk_societe_numero')->references(['id_societe'])->on('societes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dernier_numero_devis_facture', function (Blueprint $table) {
            $table->dropForeign('fk_societe_numero');
        });
    }
};
