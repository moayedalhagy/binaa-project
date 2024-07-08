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
        Schema::create('questions', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('version_id');
            $table->string('label');
            $table->decimal('points');
            $table->tinyInteger('type');
            $table->tinyInteger('day');
            $table->tinyInteger('sort_order', autoIncrement: false, unsigned: true);

            $table->unique(['version_id', 'day', 'sort_order']);

            $table->timestamps();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('version_id')
                ->references('id')
                ->on('versions')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
