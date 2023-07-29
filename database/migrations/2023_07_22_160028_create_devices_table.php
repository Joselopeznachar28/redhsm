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
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip')->unique()->nullable();
            $table->string('mark');
            $table->string('model');
            $table->string('type');
            $table->string('user_admin')->nullable();
            $table->string('password_admin')->nullable();
            $table->string('name')->unique();

            $table->foreignId('cdd_id')->constrained('c_d_d_s')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
