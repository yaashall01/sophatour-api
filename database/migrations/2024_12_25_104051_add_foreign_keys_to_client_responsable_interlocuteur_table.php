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
        Schema::table('client_responsable_interlocuteur', function (Blueprint $table) {
            $table->foreign(['clients'], 'client_responsable_interlocuteur_ibfk_1')->references(['id_client'])->on('clients')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['c_responsable_interlocuteur'], 'client_responsable_interlocuteur_ibfk_2')->references(['id_c_responsable_interlocuteur'])->on('c_responsable_interlocuteur')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_responsable_interlocuteur', function (Blueprint $table) {
            $table->dropForeign('client_responsable_interlocuteur_ibfk_1');
            $table->dropForeign('client_responsable_interlocuteur_ibfk_2');
        });
    }
};
