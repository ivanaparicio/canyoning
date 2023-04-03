<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('phone');
            $table->string('email');
            $table->string('type');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
