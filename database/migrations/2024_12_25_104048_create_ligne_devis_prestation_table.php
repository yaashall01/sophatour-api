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
        Schema::create('ligne_devis_prestation', function (Blueprint $table) {
            $table->integer('id_ligne_devis_prestation', true);
            $table->text('designation')->nullable();
            $table->text('prestation')->nullable();
            $table->integer('client_ligne_devis_type_prestation')->nullable()->index('ligne_devis_prestation_ibfk_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_devis_prestation');
    }
};
