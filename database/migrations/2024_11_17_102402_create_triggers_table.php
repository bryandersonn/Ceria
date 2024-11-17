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
        Schema::create('triggers', function (Blueprint $table) {
            $table->id('triggerID');
            $table->unsignedBigInteger('problemID');
            $table->foreign('problemID')->references('problemID')->on('problems')->onDelete('cascade');
            $table->string('triggerName');
            $table->text('triggerDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triggers');
    }
};
