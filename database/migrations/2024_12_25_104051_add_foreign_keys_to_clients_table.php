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
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign(['utilisateurs'], 'clients_ibfk_1')->references(['id_user'])->on('utilisateurs')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['client_type'], 'clients_ibfk_2')->references(['id_client_type'])->on('client_type')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['client_secteur'], 'clients_ibfk_3')->references(['id_secteur'])->on('client_secteur')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_societe'], 'clients_ibfk_4')->references(['id_societe'])->on('societes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_ibfk_1');
            $table->dropForeign('clients_ibfk_2');
            $table->dropForeign('clients_ibfk_3');
            $table->dropForeign('clients_ibfk_4');
        });
    }
};
