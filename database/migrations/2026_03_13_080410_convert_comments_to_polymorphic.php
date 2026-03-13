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
        Schema::table('comments', function (Blueprint $table) {
            $table->nullableMorphs('commentable');
        });

        // Migrate existing article comments
        \DB::table('comments')->update([
            'commentable_id' => \DB::raw('article_id'),
            'commentable_type' => 'App\Models\Article'
        ]);

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropColumn('article_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });

        // Restore data if possible (best effort)
        \DB::table('comments')->where('commentable_type', 'App\Models\Article')
            ->update(['article_id' => \DB::raw('commentable_id')]);

        Schema::table('comments', function (Blueprint $table) {
            $table->dropMorphs('commentable');
        });
    }
};
