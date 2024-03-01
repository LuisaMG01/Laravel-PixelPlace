<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Challenge name
            $table->string('description'); // Challenge description
            $table->boolean('checked'); // Flag to indicate if challenge is checked
            $table->integer('reward_coins'); // Number of reward coins for completing the challenge
            $table->integer('max_users'); // Maximum number of users allowed for the challenge
            $table->integer('current_users'); // Current number of users participating in the challenge
            $table->string('product_name'); // Name of the product associated with the challenge
            $table->date('expiration_date'); // Expiration date of the challenge
            $table->integer('product_quantity'); // Quantity of the product associated with the challenge
            $table->timestamps(); // Timestamps for created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('challenges'); // Drop the challenges table
    }
};