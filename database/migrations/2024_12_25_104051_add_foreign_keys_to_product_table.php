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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign(['categories_id'], 'product_ibfk_1')->references(['categories_id'])->on('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_societe'], 'product_ibfk_2')->references(['id_societe'])->on('societes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_ibfk_1');
            $table->dropForeign('product_ibfk_2');
        });
    }
};
