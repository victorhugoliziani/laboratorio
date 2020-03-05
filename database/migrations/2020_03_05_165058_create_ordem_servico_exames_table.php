<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoExamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servico_exames', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("ordem_servico_id")->unsigned()->index();
            $table->bigInteger("exame_id")->unsigned()->index();
            $table->decimal("preco", 8, 2);

            $table->foreign("ordem_servico_id")->references("id")->on("ordem_servicos");
            $table->foreign("exame_id")->references("id")->on("exames");

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
        Schema::dropIfExists('ordem_servico_exames');
    }
}
