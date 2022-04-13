<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DirectDistanceDialing;
use Illuminate\Database\Seeder;

class DirectDistanceDialingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directDistanceDialings = [
            ['id' => 1, 'code' => '011'],
            ['id' => 2, 'code' => '016'],
            ['id' => 3, 'code' => '017'],
            ['id' => 4, 'code' => '018'],
        ];

        DirectDistanceDialing::insert($directDistanceDialings);
    }
}
