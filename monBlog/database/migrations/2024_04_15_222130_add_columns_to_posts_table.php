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
        Schema::table('posts', function (Blueprint $table) {
            $table->text('titre1')->nullable();
            $table->longtext('paragraphe1')->nullable();
            $table->string('image1')->nullable();
            $table->text('titre2')->nullable();
            $table->longtext('paragraphe2')->nullable();
            $table->string('image2')->nullable();
            $table->text('titre3')->nullable();
            $table->longtext('paragraphe3')->nullable();
            $table->string('image3')->nullable();
            $table->longtext('conclusion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('titre1');
            $table->dropColumn('paragraphe1');
            $table->dropColumn('titre2');
            $table->dropColumn('paragraphe2');
            $table->dropColumn('titre3');
            $table->dropColumn('paragraphe3');
            $table->dropColumn('image1');
            $table->dropColumn('image2');
            $table->dropColumn('image3');
            $table->dropColumn('conclusion');
        });
    }
};
