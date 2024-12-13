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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->default(0); 
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->longText('description')->nullable()->default(NULL);
            $table->longText('meta_title')->nullable()->default(NULL);
            $table->longText('meta_key')->nullable()->default(NULL);
            $table->longText('meta_description')->nullable()->default(NULL);
            $table->enum('status', ['active', 'inactive'])->default('active');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
