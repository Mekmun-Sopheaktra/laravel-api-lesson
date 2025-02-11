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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('description')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->decimal('salary', 8, 2)->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('status')->default('pending');
            $table->enum('seller_status', ['completed', 'pending', 'in_transit', 'cancelled'])->default('pending');
            $table->date('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('meta')->nullable();

            //foreign key for one to one relationship with users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
