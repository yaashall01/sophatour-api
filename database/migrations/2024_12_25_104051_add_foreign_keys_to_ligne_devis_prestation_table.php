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
        Schema::table('ligne_devis_prestation', function (Blueprint $table) {
            $table->foreign(['client_ligne_devis_type_prestation'], 'ligne_devis_prestation_ibfk_1')->references(['id_client_ligne_devis_type_prestation'])->on('client_ligne_devis_type_prestation')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ligne_devis_prestation', function (Blueprint $table) {
            $table->dropForeign('ligne_devis_prestation_ibfk_1');
        });
    }
};
