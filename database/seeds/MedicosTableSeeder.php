<?php

use Illuminate\Database\Seeder;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert(
            ['nome' => 'Dr. João Maria', 'especialidade' => 'Urologista']
        );
        DB::table('medicos')->insert(
            ['nome' => 'Dra. Liziani da Silva', 'especialidade' => 'Cardiologista']
        );
        DB::table('medicos')->insert(
            ['nome' => 'Dr. Serafim pererira', 'especialidade' => 'Pediatra']
        );
        DB::table('medicos')->insert(
            ['nome' => 'Dra. Geovana Xavier', 'especialidade' => 'Nutrologa']
        );
    }
}
