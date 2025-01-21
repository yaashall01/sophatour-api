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
        Schema::create('client_devis', function (Blueprint $table) {
            $table->integer('id_client_devis', true);
            $table->date('le_devis')->nullable();
            $table->string('a_devis')->nullable();
            $table->string('objet', 400)->nullable();
            $table->dateTime('date_d_entree')->nullable();
            $table->date('du_date')->nullable();
            $table->date('a_tel_date')->nullable();
            $table->integer('TVA');
            $table->integer('devis_objet')->nullable()->index('fk_devis_objet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_devis');
    }
};
