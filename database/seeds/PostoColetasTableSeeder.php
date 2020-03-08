<?php

use Illuminate\Database\Seeder;

class PostoColetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posto_coletas')->insert(
            ['descricao' => 'Laboratório RP', 'endereco' => 'AV. Waldemar de Freitas Assunção, 301, Rios de Spagna, São José do Rio Preto']
        );
        DB::table('posto_coletas')->insert(
            ['descricao' => 'Laboratório For Life', 'endereco' => 'Rua. 12, 301, Centro, São José do Rio Preto']
        );
        DB::table('posto_coletas')->insert(
            ['descricao' => 'Laboratório Luz da Vida', 'endereco' => 'Rua Fritz Jacobs, 1084, Boa vista, São José do Rio Preto']
        );
    }
}
