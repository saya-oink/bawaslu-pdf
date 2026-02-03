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
        Schema::create('document_archives', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->string('original_name');
    $table->string('stored_name');
    $table->string('stored_path');

    $table->string('text_left')->nullable();
    $table->string('text_right')->nullable();
    $table->string('wm_color', 10)->nullable();

    $table->integer('page_count');
    $table->bigInteger('file_size');

    $table->timestamp('locked_at');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_archives');
    }
};
