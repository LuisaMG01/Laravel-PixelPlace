<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE challenges CHANGE product_quantity category_quantity INT');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE challenges CHANGE product_quantity category_quantity INT');
    }
};
