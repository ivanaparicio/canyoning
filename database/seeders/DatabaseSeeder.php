<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'santandercanyoning@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('santander2023'),
            'remember_token' => Str::random(10),
        ]);

        Storage::deleteDirectory('images/banner');
        Storage::deleteDirectory('images/reviews');
        Storage::deleteDirectory('images/services');
        Storage::deleteDirectory('images/gallery');
        $this->call(CompanySeeder::class);

        if (false) {
            $this->call(ServicesSeeder::class);
            $this->call(PlanSeeder::class);
        }
    }
}
