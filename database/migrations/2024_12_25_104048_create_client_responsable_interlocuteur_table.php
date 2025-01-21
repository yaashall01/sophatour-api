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
        Schema::create('client_responsable_interlocuteur', function (Blueprint $table) {
            $table->integer('id_client_responsable_interlocuteur', true);
            $table->string('nom_complet')->nullable();
            $table->string('email')->nullable();
            $table->string('numero_telephone')->nullable();
            $table->integer('c_responsable_interlocuteur')->nullable()->index('c_responsable_interlocuteur');
            $table->integer('clients')->nullable()->index('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_responsable_interlocuteur');
    }
};
