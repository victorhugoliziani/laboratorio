<?php

use Illuminate\Database\Seeder;

class ExamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exames')->insert(
            ['descricao' => 'Espermograma', 'preco' => '60.00']
        );
        DB::table('exames')->insert(
            ['descricao' => 'Exames de imagens', 'preco' => '120.00']
        );
        DB::table('exames')->insert(
            ['descricao' => 'Eletrocardiograma', 'preco' => '80.00']
        );
    }
}
