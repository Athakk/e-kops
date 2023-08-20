<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1,'nm_kategori' => 'Makanan'],
            ['id' => 2,'nm_kategori' => 'Minuman'],
            ['id' => 3,'nm_kategori' => 'Kain'],
            ['id' => 4,'nm_kategori' => 'ATK'],
            ['id' => 5,'nm_kategori' => 'Atribut'],
        ];
        foreach ($data as $value) {
            Kategori::create($value);
        }
    }
}
