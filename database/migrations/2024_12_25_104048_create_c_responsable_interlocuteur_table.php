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
        Schema::create('c_responsable_interlocuteur', function (Blueprint $table) {
            $table->integer('id_c_responsable_interlocuteur', true);
            $table->string('type_responsable_interlocuteur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_responsable_interlocuteur');
    }
};
