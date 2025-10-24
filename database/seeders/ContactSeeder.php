<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Cv Critical Performance',
            'description' => 'Jangan lupa datang ke kami',
            'logo' => 'logo.png',
            'alamat' => 'Griya Artha rajeg blok j5/4',
            'email' => 'Criticalperformance14@gmail.com',
            'telepon' => '085157917422',
            'maps_emded' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1067738520064!2d106.52828307333972!3d-6.116326393870277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41ff56c3f042f3%3A0xa8ccbac2d1d1e815!2sREMAP%20ECU%20HONDA%20(%20CRITICAL%20PERFORMANCE)!5e0!3m2!1sid!2sid!4v1761295440857!5m2!1sid!2sid',
        ]);
    }
}
