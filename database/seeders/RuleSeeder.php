<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rule::insert([
            [
                "disease_id" => 1,
                "indication_id" => 1,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 2,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 3,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 4,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 5,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 6,
            ],
            [
                "disease_id" => 1,
                "indication_id" => 7,
            ],
        ]);
        Rule::insert([
            [
                "disease_id" => 2,
                "indication_id" => 6
            ],
            [
                "disease_id" => 2,
                "indication_id" => 7
            ],
            [
                "disease_id" => 2,
                "indication_id" => 8
            ],
            [
                "disease_id" => 2,
                "indication_id" => 9
            ],
            [
                "disease_id" => 2,
                "indication_id" => 10
            ],
            [
                "disease_id" => 2,
                "indication_id" => 11
            ],
            [
                "disease_id" => 2,
                "indication_id" => 12
            ],
            [
                "disease_id" => 2,
                "indication_id" => 13
            ],
        ]);
        Rule::insert([
            [
                "disease_id" => 3,
                "indication_id" => 3
            ],
            [
                "disease_id" => 3,
                "indication_id" => 6
            ],
            [
                "disease_id" => 3,
                "indication_id" => 10
            ],
            [
                "disease_id" => 3,
                "indication_id" => 12
            ],
            [
                "disease_id" => 3,
                "indication_id" => 14
            ],
            [
                "disease_id" => 3,
                "indication_id" => 15
            ],
            [
                "disease_id" => 3,
                "indication_id" => 16
            ],
        ]);
        Rule::insert([
            [
                "disease_id" => 4,
                "indication_id" => 2
            ],
            [
                "disease_id" => 4,
                "indication_id" => 10
            ],
            [
                "disease_id" => 4,
                "indication_id" => 12
            ],
            [
                "disease_id" => 4,
                "indication_id" => 17
            ],
            [
                "disease_id" => 4,
                "indication_id" => 18
            ],
            [
                "disease_id" => 4,
                "indication_id" => 19
            ],
        ]);
        Rule::insert([
            [
                "disease_id" => 5,
                "indication_id" => 20
            ],
            [
                "disease_id" => 5,
                "indication_id" => 21
            ],
            [
                "disease_id" => 5,
                "indication_id" => 22
            ],
            [
                "disease_id" => 5,
                "indication_id" => 23
            ],
            [
                "disease_id" => 5,
                "indication_id" => 24
            ],
            [
                "disease_id" => 5,
                "indication_id" => 25
            ],
        ]);
    }
}
