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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('size')->nullable()->change();
            $table->string('structure')->nullable()->change();
            $table->string('constructionArea')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('size')->nullable(false)->change();
            $table->string('structure')->nullable(false)->change();
            $table->string('constructionArea')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
        });
    }
};
