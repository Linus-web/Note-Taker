<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('note_blocks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('note_id')->constrained()->onDelete('cascade');
        $table->enum('type', ['header', 'subheader', 'paragraph', 'list', 'code_snippet']);
        $table->text('content');
        $table->json('meta')->nullable(); // Optional metadata (e.g., list items, code language)
        $table->integer('order'); // Keeps track of the block order within the note
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('note_blocks');
}

};
