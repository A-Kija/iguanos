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
        Schema::create('product_invoices', function (Blueprint $table) {
            $table->id();
            $table->index(['product_id', 'invoice_id']);
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->decimal('quantity', 8, 2);
            $table->unsignedInteger('in_row')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_invoices');
    }
};
