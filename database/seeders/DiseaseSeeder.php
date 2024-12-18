<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $no = 1;
        $penyakit = ["Diare","Kejang Demam","Bronchopneumonia","Asma","Cacingan"];
        $data = [];
        foreach ($penyakit as $key => $value) {
            $data[$key] = [
                "code" => "DIS".sprintf('%03s',$no),
                "name" => $value,
                "solution" => '-',
                "created_at" => now(),
                "updated_at" => now(),
            ];
            $no++;
        } 
        Disease::insert($data);
    }
}
