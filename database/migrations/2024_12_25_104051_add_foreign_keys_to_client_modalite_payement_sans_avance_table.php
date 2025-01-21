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
        Schema::table('client_modalite_payement_sans_avance', function (Blueprint $table) {
            $table->foreign(['clients'], 'client_modalite_payement_sans_avance_ibfk_1')->references(['id_client'])->on('clients')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_modalite_payement_sans_avance', function (Blueprint $table) {
            $table->dropForeign('client_modalite_payement_sans_avance_ibfk_1');
        });
    }
};
