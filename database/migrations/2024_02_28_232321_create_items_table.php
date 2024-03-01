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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Primary key column
            $table->timestamps(); // Created_at and updated_at columns  
            $table->integer('acquire_price_coins'); // Acquire price coins column
            $table->integer('amount'); // Acquire price gems column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items'); // Drop the items table
    }
};
