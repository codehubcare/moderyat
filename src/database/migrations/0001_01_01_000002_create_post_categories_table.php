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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->string('parent_id')->default(0);
            $table->text('content')->nullable();
            $table->unsignedBigInteger('user_id')->default(1);
            $table->boolean('is_published')->default(false);

            // SEO fields
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Abilities
            $table->boolean('has_picture')->default(false);
            $table->boolean('has_file')->default(false);

            // Media files
            $table->string('image')->nullable();

            // Etc
            $table->timestamps();

            // Store JSON value for extra customization
            $table->text('extra')->nullable();

            // Foreign Keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('post_categories');
    }
};
