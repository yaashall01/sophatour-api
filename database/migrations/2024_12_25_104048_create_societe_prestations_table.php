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
        Schema::create('societe_prestations', function (Blueprint $table) {
            $table->integer('id_societe');
            $table->integer('id_prestation')->index('id_prestation');

            $table->primary(['id_societe', 'id_prestation']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societe_prestations');
    }
};
