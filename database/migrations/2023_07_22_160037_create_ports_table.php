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
        Schema::create('ports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mode'); //Troncal o acceso
            $table->string('type')->nullable(); //ethernet o fibra
            $table->integer('number')->unique();
            $table->string('name')->unique()->nullable();
            $table->integer('speed');
            $table->string('vlan')->nullable();

            $table->foreignId('device_id')->constrained('devices')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ports');
    }
};
