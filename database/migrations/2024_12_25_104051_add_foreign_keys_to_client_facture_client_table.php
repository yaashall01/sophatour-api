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
        Schema::table('client_facture_client', function (Blueprint $table) {
            $table->foreign(['id_client_Facture'], 'client_Facture_client_ibfk_1')->references(['id_client_devis'])->on('client_devis')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_client_devis'], 'client_Facture_client_ibfk_2')->references(['id_client_devis'])->on('client_devis')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_client'], 'client_Facture_client_ibfk_3')->references(['id_client'])->on('clients')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['utilisateurs'], 'client_Facture_client_ibfk_4')->references(['id_user'])->on('utilisateurs')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_facture_client', function (Blueprint $table) {
            $table->dropForeign('client_Facture_client_ibfk_1');
            $table->dropForeign('client_Facture_client_ibfk_2');
            $table->dropForeign('client_Facture_client_ibfk_3');
            $table->dropForeign('client_Facture_client_ibfk_4');
        });
    }
};
