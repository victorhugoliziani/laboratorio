<?php

use Illuminate\Database\Seeder;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert(
            ['nome' => 'Tereza garcia', 'data_nascimento' => '1981-05-12', 'sexo' => 'Feminino', 'endereco' => 'Rua das flores, 3210, centro, São joão das duas pontes']
        );
        DB::table('pacientes')->insert(
            ['nome' => 'Paulo Henrique', 'data_nascimento' => '1975-03-23', 'sexo' => 'Masculino', 'endereco' => 'Av. da saudades, 1000, centro, São josé do rio preto']
        );
        DB::table('pacientes')->insert(
            ['nome' => 'Pedro Bento', 'data_nascimento' => '1980-01-28', 'sexo' => 'Masculino', 'endereco' => 'Rua 14, 1030, centro, Santa fé do sul']
        );
    }
}
