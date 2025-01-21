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
        Schema::create('client_ligne_devis_type_prestation', function (Blueprint $table) {
            $table->integer('id_client_ligne_devis_type_prestation', true);
            $table->string('ligne_devis_type_prestation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_ligne_devis_type_prestation');
    }
};
