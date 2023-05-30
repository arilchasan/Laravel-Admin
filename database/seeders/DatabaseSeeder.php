<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kategori::create([
            'kode' => '1',
            'nama' => 'Wisata Alam',
        ]);
        Kategori::create([
            'kode' => '2',
            'nama' => 'Wisata Hiburan',
        ]);
        Kategori::create([
            'kode' => '3',
            'nama' => 'Wisata Budaya',
        ]);
        Kategori::create([
            'kode' => '4',
            'nama' => 'Wisata Religi',
        ]);
    }
}
