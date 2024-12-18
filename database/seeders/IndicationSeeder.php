<?php

namespace Database\Seeders;

use App\Models\Indication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $no = 1;
        $gejala = ["Bab cair lebih dari 3x sehari","Lesu","Nafsu makan berkurang","Keram pada perut","Perut kembung","Demam","Muntah","Kejang 1-2x sehari","Bab cair","Sesak Nafas","Terlihat sangat mengantuk","Batuk","Pilek","Menggigil","Dada terasa sakit","Sakit kepala","Nafas berbunyi (mengi)","Faktor keturunan","Susah tidur","Anak tampak kurus","Pucat","Gatal sekitar anus","Gelisah atau tidak nyaman saat tidur","Iritasi kulit sekitar anus","Sering sakit perut"];
        $data = [];
        foreach ($gejala as $key => $value) {
            $data[$key] = [
                "code" => "IND".sprintf('%03s',$no),
                "name" => $value,
                "created_at" => now(),
                "updated_at" => now(),
            ];
            $no++;
        } 
        Indication::insert($data);
    }
}
