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
        Schema::create('c_d_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->uuid('code')->unique();
            $table->foreignId('torre_id')->constrained('torres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('floor_id')->constrained('floors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_d_d_s');
    }
};
