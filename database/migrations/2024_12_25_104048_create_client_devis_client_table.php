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
        Schema::create('client_devis_client', function (Blueprint $table) {
            $table->integer('id_client_devis');
            $table->integer('id_client')->index('id_client');
            $table->integer('utilisateurs')->nullable()->index('utilisateurs');
            $table->float('version_devis', null, 0)->nullable();
            $table->string('Numero_devis')->nullable();
            $table->double('prix_total_ttc', null, 0);
            $table->boolean('confirmer')->default(false);
            $table->boolean('annuler')->default(false);
            $table->integer('id_annulation_cause')->nullable()->index('id_annulation_cause');
            $table->string('anuulation_cause', 700)->nullable();

            $table->primary(['id_client_devis', 'id_client']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_devis_client');
    }
};
