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
        Schema::create('users', function (Blueprint $table) {
            // Defining the UserID as the primary key
            $table->id('UserID');
            // Email field with unique constraint
            $table->string('email')->unique();
            // Optional email verification timestamp
            $table->timestamp('email_verified_at')->nullable();
            // Password field
            $table->string('password');
            // Role field with default value 'User'
            $table->enum('role', ['User', 'Therapist', 'Admin'])->default('User');
            // Remember token field
            $table->rememberToken();
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the users table
        Schema::dropIfExists('users');
    }
};
