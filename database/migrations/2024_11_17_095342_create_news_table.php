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
        Schema::create('news', function (Blueprint $table) {
            $table->id('newsID');
            $table->unsignedBigInteger('problemID');
            $table->foreign('problemID')->references('problemID')->on('problems')->onDelete('cascade');
            $table->string('newsTitle');
            $table->string('newsWriter');
            $table->dateTime('newsPublishDate');
            $table->string('newsImage');
            $table->text('newsContent');
            $table->string('newsLink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
