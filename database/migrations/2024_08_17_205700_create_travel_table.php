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
        Schema::create('travel', function (Blueprint $table) {
            $table->id('stage_number');
            $table->string('title', 200);
            $table->date('date');
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('valutation')->nullable();
            $table->string('people')->nullable();
            $table->text('additional_notes', 500)->nullable();
            $table->boolean('completed');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
