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
            'judul' => 'Company',
            'subjudul' => 'Lorem Ipsum',
            'deskripsi_1' => 'Lorem Ipsum',
            'deskripsi_2' => 'Lorem Ipsum',
            'kelebihan_1' => 'Lorem Ipsum',
            'kelebihan_2' => 'Lorem Ipsum',
            'kelebihan_3' => 'Lorem Ipsum',
            'kelebihan_4' => 'Lorem Ipsum',
        ]);
    }
}
