<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder {
    
    public function run(): void {
        
        Company::create([
            'email' => 'santandercanyoning@gmail.com',
            'phone1' => '3232253868',
            'phone2' => '',
            'address' => 'carrea 11 # 9 - 102',
            'hours' => '8 AM - 7 PM, Lunes a Domingo',
            'instagram' => 'https://www.instagram.com/santandercanyoning/',
            'facebook' => 'https://www.facebook.com/santandercanyoning/',
            'youtube' => 'https://www.youtube.com/',
            'whatsapp' => '3232253868',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7927.512362980623!2d-73.13174800000002!3d6.552436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e69c7431c9b0305%3A0xe89e0d0dd362cf3e!2sSANTANDER%20CANYONING!5e0!3m2!1ses!2sco!4v1679775954134!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);

    }
}
