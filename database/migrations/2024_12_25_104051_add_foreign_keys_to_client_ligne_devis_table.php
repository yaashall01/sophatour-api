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
        Schema::table('client_ligne_devis', function (Blueprint $table) {
            $table->foreign(['client_ligne_devis_type_prestation'], 'client_ligne_devis_ibfk_1')->references(['id_client_ligne_devis_type_prestation'])->on('client_ligne_devis_type_prestation')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['client_devis'], 'client_ligne_devis_ibfk_2')->references(['id_client_devis'])->on('client_devis')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ligne_devis_prestation'], 'fk_client_ligne_devis_type_prestation')->references(['id_ligne_devis_prestation'])->on('ligne_devis_prestation')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_ligne_devis', function (Blueprint $table) {
            $table->dropForeign('client_ligne_devis_ibfk_1');
            $table->dropForeign('client_ligne_devis_ibfk_2');
            $table->dropForeign('fk_client_ligne_devis_type_prestation');
        });
    }
};
