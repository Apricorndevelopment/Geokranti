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
        Schema::create('level_icomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_ulid');
            $table->unsignedBigInteger('from_user_id');
            $table->string('from_user_ulid');
            $table->string('from_user_name');
            $table->decimal('purchase_amount', 12, 2);
            $table->integer('level');
            $table->decimal('percentage', 5, 2);
            $table->decimal('amount', 12, 2);
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string('package_name')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index('user_ulid');
            $table->index('from_user_ulid');
            $table->index('level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_icomes');
    }
};
