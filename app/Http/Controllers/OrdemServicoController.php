<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdemServico;
use App\OrdemServicoExame;
use App\Exame;
use App\Paciente;
use App\PostoColeta;
use App\Medico;

class OrdemServicoController extends Controller
{
 
    public function index()
    {
        $ordem_servicos = OrdemServico::all();
        if($ordem_servicos) {
            $result = array();
            for($i=0; $i<count($ordem_servicos); $i++) {
                $ordem_servico_exames =new OrdemServicoExame();
                $ordem_servico_exames = $ordem_servico_exames->where('ordem_servico_id', '=', $ordem_servicos[$i]->id)->first();
                if($ordem_servico_exames) {

                    $paciente = Paciente::find($ordem_servicos[$i]->paciente_id);
                    $posto_coleta = PostoColeta::find($ordem_servicos[$i]->posto_coleta_id);
                    $medico = Medico::find($ordem_servicos[$i]->medico_id);
                    $exame = Exame::find($ordem_servico_exames->exame_id);

                    $itens_ordem = [
                        "ordem_servico_id" => $ordem_servicos[$i]->id,
                        "id" => $ordem_servicos[$i]->id,
                        "paciente_id" => $ordem_servicos[$i]->paciente_id,
                        "paciente_nome" => $paciente->nome,
                        "posto_coleta_id" => $ordem_servicos[$i]->posto_coleta_id,
                        "posto_coleta_descricao" => $posto_coleta->descricao,
                        "medico_id" => $ordem_servicos[$i]->medico_id,
                        "medico_nome" => $medico->nome,
                        "convenio" => $ordem_servicos[$i]->convenio,
                        "data" => $ordem_servicos[$i]->data,
                        "exame_id" => $ordem_servico_exames->exame_id,
                        "exame_descricao" => $exame->descricao,
                        "preco" => $ordem_servico_exames->preco
                    ];
                    array_push($result, $itens_ordem);
                    
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

            $paciente = Paciente::find($ordem_servico->paciente_id);
            $posto_coleta = PostoColeta::find($ordem_servico->posto_coleta_id);
            $medico = Medico::find($ordem_servico->medico_id);
            $exame = Exame::find($ordem_servico_exames->exame_id);

            return json_encode(
                                [
                                    "ordem_servico_id" => $ordem_servico->id,
                                    "id" => $ordem_servico->id,
                                    "paciente_id" => $ordem_servico->paciente_id,
                                    "paciente_nome" => $paciente->nome,
                                    "posto_coleta_id" => $ordem_servico->posto_coleta_id,
                                    "posto_coleta_descricao" => $posto_coleta->descricao,
                                    "medico_id" => $ordem_servico->medico_id,
                                    "medico_nome" => $medico->nome,
                                    "convenio" => $ordem_servico->convenio,
                                    "data" => $ordem_servico->data,
                                    "exame_id" => $ordem_servico_exames->exame_id,
                                    "exame_descricao" => $exame->descricao,
                                    "preco" => $ordem_servico_exames->preco,
                                    "insert" => true, 
                                    "message" => "Ordem de serviço cadastrada com sucesso!"
                                ]
                            );
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
