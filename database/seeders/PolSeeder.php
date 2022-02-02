<?php

namespace Database\Seeders;

use App\Models\Pol;
use Illuminate\Database\Seeder;

class PolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pol::create([
            'pol' => 'muski',
            'skracenoPol' => 'M'
        ]);

        Pol::create([
            'pol' => 'zenski',
            'skracenoPol' => 'Z'
        ]);
    }
}
