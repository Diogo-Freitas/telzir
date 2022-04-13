<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
            ['id' => 1, 'source_code_id' => 1, 'destination_code_id' => 2, 'value' => 1.90],
            ['id' => 2, 'source_code_id' => 2, 'destination_code_id' => 1, 'value' => 2.90],
            ['id' => 3, 'source_code_id' => 1, 'destination_code_id' => 3, 'value' => 1.70],
            ['id' => 4, 'source_code_id' => 3, 'destination_code_id' => 1, 'value' => 2.70],
            ['id' => 5, 'source_code_id' => 1, 'destination_code_id' => 4, 'value' => 0.90],
            ['id' => 6, 'source_code_id' => 4, 'destination_code_id' => 1, 'value' => 1.90],
        ];

        Rate::insert($rates);
    }
}
