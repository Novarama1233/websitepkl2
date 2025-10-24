<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'judul' => 'Cv. Critical Performance',
            'subjudul' => 'Bengkel Remap ecu',
            'deskripsi_1' => 'kami menyediakan berbagai layanan',
            'deskripsi_2' => 'banyak yang suka service di kami',
            'kelebihan_1' => 'kami ada service remap ecu',
            'kelebihan_2' => 'kami ada service porting polish',
            'kelebihan_3' => 'ganti ban',
            'kelebihan_4' => 'ganti oli',
        ]);
    }
}
