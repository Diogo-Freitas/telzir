<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            ['id' => 1, 'name' => 'FaleMais 30', 'free_time' => 30],
            ['id' => 2, 'name' => 'FaleMais 60', 'free_time' => 60],
            ['id' => 3, 'name' => 'FaleMais 120', 'free_time' => 120],
        ];

        Plan::insert($plans);
    }
}
