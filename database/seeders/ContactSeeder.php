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
            'name' => 'Company',
            'description' => 'Lorem Ipsum',
            'logo' => 'logo.png',
            'alamat' => 'Griya Artha rajeg blok j5/4',
            'email' => 'company@gmail.com',
            'telepon' => '083822623170',
            'maps_emded' => 'maps.com',
        ]);
    }
}
