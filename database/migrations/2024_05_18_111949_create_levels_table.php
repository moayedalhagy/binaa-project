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
        Schema::create('levels', function (Blueprint $table) {

            $table->id();
            // $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('label', 50)->unique();
            // $table->decimal('value', 5, 2); // 100.99
            // $table->integer('sort_order')->nullable()->unique();
            $table->integer('sort_order', autoIncrement: false, unsigned: true)->unique();
            // $table->boolean('published')->default(false);
            $table->timestamps();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();




            // $table->foreign('parent_id')
            //     ->references('id')
            //     ->on('levels')
            //     ->cascadeOnUpdate()
            //     ->restrictOnDelete();

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
