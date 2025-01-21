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
        Schema::create('client_facture_client', function (Blueprint $table) {
            $table->integer('id_client_Facture')->index('id_client_facture');
            $table->integer('id_client_devis');
            $table->integer('id_client')->index('id_client');
            $table->integer('utilisateurs')->nullable()->index('utilisateurs');
            $table->string('Numero_Facture')->nullable();
            $table->double('prix_total_ttc', null, 0);

            $table->primary(['id_client_devis', 'id_client', 'id_client_Facture']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_facture_client');
    }
};
