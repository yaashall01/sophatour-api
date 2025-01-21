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
        Schema::create('client_ligne_devis', function (Blueprint $table) {
            $table->integer('id_client_ligne_devis', true);
            $table->text('prestation')->nullable();
            $table->float('unite', null, 0)->nullable();
            $table->float('nbr_jour', null, 0)->nullable();
            $table->float('pu_ht', null, 0)->nullable();
            $table->double('pt_ht', null, 0)->nullable();
            $table->integer('client_ligne_devis_type_prestation')->nullable()->index('client_ligne_devis_type_prestation');
            $table->integer('client_devis')->nullable()->index('client_devis');
            $table->integer('ligne_devis_prestation')->nullable()->index('fk_client_ligne_devis_type_prestation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_ligne_devis');
    }
};
