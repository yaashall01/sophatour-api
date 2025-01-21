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
        Schema::table('client_devis', function (Blueprint $table) {
            $table->foreign(['devis_objet'], 'fk_devis_objet')->references(['id_devis_objet'])->on('devis_objet')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_devis', function (Blueprint $table) {
            $table->dropForeign('fk_devis_objet');
        });
    }
};
