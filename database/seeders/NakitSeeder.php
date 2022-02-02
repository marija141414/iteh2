<?php

namespace Database\Seeders;

use App\Models\Nakit;
use Illuminate\Database\Seeder;

class NakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++){
            Nakit::create([
                'model' => $faker->sentence(1),
                'gramaza' => rand(100, 400) . ' g',
                'opis' => $faker->sentence(8),
                'polId' => rand(1,2),
                'materijalId' => rand(1,3)
            ]);
        }
    }
}
