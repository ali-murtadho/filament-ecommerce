<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('image');
            $table->bigInteger('category_id')->unsigned()->nullable()->constrained('category')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
