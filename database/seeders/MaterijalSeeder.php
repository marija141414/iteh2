<?php

namespace Database\Seeders;

use App\Models\Materijal;
use Illuminate\Database\Seeder;

class MaterijalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materijal::create([
            'tipMaterijala' => 'srebro'
        ]);

        Materijal::create([
            'tipMaterijala' => 'zlato'
        ]);

        Materijal::create([
            'tipMaterijala' => 'bizuterija'
        ]);
    }
}
