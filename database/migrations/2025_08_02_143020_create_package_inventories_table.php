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
        Schema::create('user_package_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('user_ulid');
            $table->foreignId('package_id')->constrained('package2');
            $table->integer('quantity')->default(0);
            $table->timestamps();

            $table->unique(['user_ulid', 'package_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_inventories');
    }
};
