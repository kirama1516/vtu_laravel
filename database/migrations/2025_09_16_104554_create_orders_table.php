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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('biller_id')->references('id')->on('billers')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_reference')->nullable();
            $table->string('provider_response')->nullable();
            $table->string('provider_message')->nullable();
            $table->string('reference');
            $table->decimal('price')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('total')->nullable();
            $table->string('beneficiary')->nullable();
            $table->string('sender')->nullable();
            $table->string('message')->nullable();
            $table->string('meterType')->nullable();
            $table->string('meterNumber')->nullable();
            $table->string('meterName')->nullable();
            $table->string('responseAPI')->nullable();
            $table->string('responseMessage')->nullable();
            $table->string('token')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
