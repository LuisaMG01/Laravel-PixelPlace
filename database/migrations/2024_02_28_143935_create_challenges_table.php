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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('description');
            $table->boolean('checked');
            $table->integer('reward_coins');
            $table->integer('max_users');
            $table->integer('current_users');
            $table->string('product_name');
            $table->date('expiration_date');
            $table->integer('product_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
