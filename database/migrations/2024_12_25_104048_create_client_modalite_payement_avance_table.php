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
        Schema::create('client_modalite_payement_avance', function (Blueprint $table) {
            $table->integer('id_client_modalite_payement_avance', true);
            $table->integer('pourcentage')->nullable();
            $table->integer('etalonage')->nullable();
            $table->boolean('semaine')->nullable();
            $table->boolean('mois')->nullable();
            $table->integer('clients')->nullable()->index('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_modalite_payement_avance');
    }
};
