<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->after('id', function(Blueprint $table){
                $table->boolean('is_main')->default(0);
            });
        });
    }

    
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->removeColumn('is_main');
        });
    }
};
