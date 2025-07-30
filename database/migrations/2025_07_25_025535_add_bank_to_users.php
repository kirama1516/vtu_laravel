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
        Schema::table('users', function (Blueprint $table) {
            $table->string('pin');
            $table->string('accName');
            $table->string('accNumber');
            $table->string('bankName');
            $table->enum('role', ['user', 'admin', 'superAdmin'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('reset_token_hash')->nullable();
            $table->timestamp('reset_token_expires_at')->nullable();
            $table->tinyInteger('isVerified')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
