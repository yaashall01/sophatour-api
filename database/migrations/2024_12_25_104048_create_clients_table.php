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
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id_client', true);
            $table->string('societe')->nullable()->unique('societe');
            $table->string('nom_complet')->nullable()->unique('nom_complet');
            $table->string('ice', 300)->nullable();
            $table->string('rc', 300)->nullable();
            $table->string('adresse', 1500)->nullable();
            $table->dateTime('date_d_entree')->nullable();
            $table->integer('utilisateurs')->nullable()->index('utilisateurs');
            $table->integer('client_type')->nullable()->index('client_type');
            $table->boolean('avance')->nullable();
            $table->integer('client_secteur')->nullable()->index('client_secteur');
            $table->boolean('Agence_evementiel')->nullable();
            $table->integer('id_societe')->nullable()->index('id_societe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
