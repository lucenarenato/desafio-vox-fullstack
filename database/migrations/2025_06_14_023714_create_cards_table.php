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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000);
            $table->text('description')->nullable();
            $table->string('label_title', 100);
            $table->string('label_color', 50);
            $table->string('list_title', 255);
            $table->integer('card_order');
            $table->integer('list_id')->nullable();
            $table->string('due_date', 255)->nullable();
            $table->string('card_timestamp', 255)->nullable();
            $table->string('archive_class', 50)->default('');
            $table->string('create_date', 60)->nullable();
            $table->text('card_attachment')->nullable(); // 20000 chars
            $table->string('labels_string', 1000)->charset('utf8')->default('');
            $table->text('checklist_string')->charset('utf8')->nullable();
            $table->boolean('is_complete')->default(false);

            // Relacionamentos (opcional)
            $table->foreignId('list_id_fk')->constrained('lists')->onDelete('cascade')->nullable();
            $table->foreignId('label_id')->constrained('labels')->onDelete('set null')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
