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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_barcode');
            $table->unsignedBigInteger('supplier_id');
            $table->bigInteger('jumlah')->default(0);
            $table->enum('keterangan', ['Penambahan', 'Pengurangan'])->default('Penambahan');
            $table->foreign('product_barcode')->references('barcode')->on('products')->cascadeOnDelete();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
