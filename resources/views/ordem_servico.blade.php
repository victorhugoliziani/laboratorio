<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SHIFT - Ordem de Serviço</title>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
        <link rel="stylesheet" href="{{ URL::asset('/') }}css/ordem_servico.css" />
    </head>
    <body>
        

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{url("images/shift.png")}}" >
                    <span>Ordem de serviço</span>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-5">
                        <form id="form-ordem-servico" class="form-ordem-servico">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data* </div>
                                    </div>
                                    <input type="date" data-name="Data" name="data" id="data" class="form-control">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Paciente*</div>
                                    </div>
                                    <select name="paciente_id" data-name="Paciente" id="paciente_id" class="form-control">
                                        <option value="">Selecione um paciente</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Convênio*</div>
                                    </div>
                                    <input type="text" name="convenio" data-name="Convênio" id="convenio" class="form-control">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Posto de Coleta*</div>
                                    </div>
                                    <select name="posto_coleta_id" data-name="Posto de coleta" id="posto_coleta_id" class="form-control">
                                        <option value="">Selecione um Posto de coleta</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Médico*</div>
                                    </div>
                                    <select name="medico_id" id="medico_id" data-name="Médico" class="form-control">
                                        <option value="">Selecione um médico</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Exames*</div>
                                    </div>
                                    <select name="exame_id" id="exame_id" data-name="Exame" class="form-control">
                                        <option value="">Selecione um exame</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btnCadastrar" class="btnCadastrar btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col"></div>
                        <div class="col col-sm-12 col-md-9">
                            <h2 class="title">ÚLTIMAS ORDENS DE SERVIÇOS CADASTRADAS</h2>
                        </div>
                        <div class="col"></div>
                    </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-sm-12 col-md-9">
                        <table class="table" id="tableOrdens">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PACIENTE</th>
                                    <th>CONVÊNIO</th>
                                    <th>MÉDICO</th>
                                    <th>EXAME</th>
                                    <th>PREÇO</th>
                                    <th>POSTO DE COLETA</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('/') }}js/ordem_servico.js" ></script>
    </body>
</html>
