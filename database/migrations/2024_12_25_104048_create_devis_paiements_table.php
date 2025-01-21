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
        Schema::create('devis_paiements', function (Blueprint $table) {
            $table->integer('id_devis_paiements', true);
            $table->string('statut');
            $table->integer('client_devis_client')->nullable()->index('client_devis_client');
            $table->integer('document')->index('document');
            $table->integer('devis_mode_paiements')->nullable()->index('devis_mode_paiements');
            $table->double('Montant', null, 0)->nullable();
            $table->boolean('avec_exoneration');
            $table->dateTime('created');
            $table->text('commentaire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis_paiements');
    }
};
