<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("paciente_id")->unsigned()->index();
            $table->bigInteger("posto_coleta_id")->unsigned()->index();
            $table->bigInteger("medico_id")->unsigned()->index();
            $table->string("convenio");
            $table->date("data");

            $table->foreign("paciente_id")->references("id")->on("pacientes");
            $table->foreign("posto_coleta_id")->references("id")->on("posto_coletas");
            $table->foreign("medico_id")->references("id")->on("medicos");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
}
