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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('product_id', true);
            $table->string('product_name');
            $table->text('product_image');
            $table->integer('categories_id')->index('categories_id');
            $table->string('quantity_initiale');
            $table->integer('quantity');
            $table->string('rate');
            $table->integer('active')->default(0);
            $table->integer('status')->default(0);
            $table->integer('id_societe')->nullable()->index('id_societe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
