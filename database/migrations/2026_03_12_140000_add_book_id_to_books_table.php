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
        Schema::table('books', function (Blueprint $table) {
            $table->string('book_id')->unique()->after('id');
        });

        // Generate book_id for existing records
        \DB::statement('UPDATE books SET book_id = CONCAT("BOOK-", LPAD(id, 4, "0")) WHERE book_id IS NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('book_id');
        });
    }
};
