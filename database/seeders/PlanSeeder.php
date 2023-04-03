<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{

    public $inlcude = ['Canotaje', 'Cueva', 'Parapente', '3 personas'];

    public function run(): void
    {
        Plan::create([
            'title' => 'Básico',
            'price' => '$200.000',
            'status' => 1,
            'description' => $this->inlcude,
        ]);

        Plan::create([
            'title' => 'Intermedio',
            'price' => '$400.00',
            'status' => 1,
            'description' => $this->inlcude,
        ]); 

        Plan::create([
            'title' => 'Full',
            'price' => '$500.00',
            'status' => 1,
            'description' => $this->inlcude,
        ]);        
    }
}
