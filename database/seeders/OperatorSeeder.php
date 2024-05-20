<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operator;
use Faker\Generator as Faker;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 12; $i++) { 
            $newOperator = new Operator();
            $newOperator->name = $faker->name();
            $newOperator->is_busy = $faker->randomElement([0, 1]);

            $newOperator->save();
        }
    }
}
