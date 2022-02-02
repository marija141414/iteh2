<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PolSeeder::class);
        $this->call(MaterijalSeeder::class);
        $this->call(NakitSeeder::class);
        $this->call(UserSeeder::class);
    }
}
