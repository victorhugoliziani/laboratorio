<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdemServico;
use App\OrdemServicoExame;
use App\Exame;

class OrdemServicoController extends Controller
{
 
    public function index()
    {
        $ordem_servicos = OrdemServico::all();
        if($ordem_servicos) {
            $result = array();
            for($i=0; $i<count($ordem_servicos); $i++) {
                $ordem_servico_exames =new OrdemServicoExame();
                $ordem_servico_exames = $ordem_servico_exames->where('ordem_servico_id', '=', $ordem_servicos[$i]->id)->get();
                if($ordem_servico_exames) {
                    for($j=0; $j<count($ordem_servico_exames); $j++) {
                        $itens_ordem_exames = [
                            "exame_id" => $ordem_servico_exames[$j]->exame_id,
                            "preco" => $ordem_servico_exames[$j]->preco,
                        ];

                        $itens_ordem = [
                            "ordem_servico_id" => $ordem_servicos[$i]->id,
                            "id" => $ordem_servicos[$i]->id,
                            "paciente_id" => $ordem_servicos[$i]->paciente_id,
                            "posto_coleta_id" => $ordem_servicos[$i]->posto_coleta_id,
                            "medico_id" => $ordem_servicos[$i]->medico_id,
                            "convenio" => $ordem_servicos[$i]->convenio,
                            "data" => $ordem_servicos[$i]->data,
                            $itens_ordem_exames
                        ];
                        array_push($result, $itens_ordem);
                    }
                }
            }
            return json_encode($result);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ordem_servico =new OrdemServico();
        $ordem_servico->paciente_id = $request->input('paciente_id');
        $ordem_servico->posto_coleta_id = $request->input('posto_coleta_id');
        $ordem_servico->medico_id = $request->input('medico_id');
        $ordem_servico->convenio = $request->input('convenio');
        $ordem_servico->data = $request->input('data');
        $ordem_servico->save();
        if($ordem_servico->save()) {
            $ordem_servico_exames =new OrdemServicoExame();
            $ordem_servico_exames->ordem_servico_id = $ordem_servico->id;
            $exame = Exame::find($request->input('exame_id'));
            $ordem_servico_exames->exame_id = $exame->id;
            $ordem_servico_exames->preco = $exame->preco;
            $ordem_servico_exames->save();
            return json_encode(["insert" => true, "message" => "Ordem de serviço cadastrada com sucesso!"]);
        } else {
            return json_encode(["insert" => false, "message" => "Erro ao tentar cadastrar ordem de serviço."]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
