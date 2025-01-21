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
        Schema::create('dernier_numero_devis_facture', function (Blueprint $table) {
            $table->integer('numero_devis_facture')->nullable();
            $table->string('type')->nullable();
            $table->integer('annee');
            $table->integer('societe_id')->index('fk_societe_numero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dernier_numero_devis_facture');
    }
};
