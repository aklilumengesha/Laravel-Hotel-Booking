<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'about_heading')) {
                $table->string('about_heading')->nullable();
            }

            if (!Schema::hasColumn('pages', 'about_content')) {
                $table->longText('about_content')->nullable();
            }

            if (!Schema::hasColumn('pages', 'image')) {
                $table->string('image')->nullable();
            }

            if (!Schema::hasColumn('pages', 'improvements')) {
                $table->json('improvements')->nullable();
            }

            if (!Schema::hasColumn('pages', 'awards')) {
                $table->json('awards')->nullable();
            }

            if (!Schema::hasColumn('pages', 'status')) {
                $table->tinyInteger('status')->default(1);
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['about_heading', 'about_content', 'image', 'improvements', 'awards', 'status']);
        });
    }
};
