<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1,'nm_satuan' => 'Buah'],
            ['id' => 2,'nm_satuan' => 'Rim'],
            ['id' => 3,'nm_satuan' => 'Lusin'],
            ['id' => 4,'nm_satuan' => 'Kwintal'],
            ['id' => 5,'nm_satuan' => 'Gross'],
            ['id' => 6,'nm_satuan' => 'Dus'],
            ['id' => 7,'nm_satuan' => 'Set'],
            ['id' => 8,'nm_satuan' => 'Botol'],
            ['id' => 9,'nm_satuan' => 'Kg'],
            ['id' => 10,'nm_satuan' => 'Hg'],
            ['id' => 11,'nm_satuan' => 'Dag'],
            ['id' => 12,'nm_satuan' => 'G'],
            ['id' => 13,'nm_satuan' => 'Dg'],
            ['id' => 14,'nm_satuan' => 'Cg'],
            ['id' => 15,'nm_satuan' => 'Mg'],
            ['id' => 16,'nm_satuan' => 'Km'],
            ['id' => 17,'nm_satuan' => 'Hm'],
            ['id' => 18,'nm_satuan' => 'Dam'],
            ['id' => 19,'nm_satuan' => 'M'],
            ['id' => 20,'nm_satuan' => 'Dm'],
            ['id' => 21,'nm_satuan' => 'Cm'],
            ['id' => 22,'nm_satuan' => 'Mm'],
            ['id' => 23,'nm_satuan' => 'Kl'],
            ['id' => 24,'nm_satuan' => 'Hl'],
            ['id' => 25,'nm_satuan' => 'Dal'],
            ['id' => 26,'nm_satuan' => 'L'],
            ['id' => 27,'nm_satuan' => 'Dl'],
            ['id' => 28,'nm_satuan' => 'Cl'],
            ['id' => 29,'nm_satuan' => 'Ml'],
            ['id' => 30,'nm_satuan' => 'Pack'],
            ['id' => 31,'nm_satuan' => 'JRG'],
            ['id' => 32,'nm_satuan' => 'PCS'],
            ['id' => 33,'nm_satuan' => 'Ekor'],
            ['id' => 34,'nm_satuan' => 'Balok'],
            ['id' => 35,'nm_satuan' => 'Ons'],
            ['id' => 36,'nm_satuan' => 'Tong'],
            ['id' => 37,'nm_satuan' => 'BTG'],
            ['id' => 38,'nm_satuan' => 'Sak'],        
        ];

        foreach ($data as $value) {
            Satuan::create($value);
        }
    }
}
