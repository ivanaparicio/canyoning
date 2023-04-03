<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->string('hours')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->text('maps')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('companies');
    }
};
