<?php

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
         $this->call(MedicosTableSeeder::class);
         $this->call(PacientesTableSeeder::class);
         $this->call(PostoColetasTableSeeder::class);
         $this->call(ExamesTableSeeder::class);
    }
}
