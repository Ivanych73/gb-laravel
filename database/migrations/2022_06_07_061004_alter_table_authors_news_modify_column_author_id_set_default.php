<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors_news', function (Blueprint $table) {
            $table->foreignId('author_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors_news', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete()->change();
        });
    }
};
