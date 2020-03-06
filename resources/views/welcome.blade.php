<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #1873a3;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color: #fff;
                font-size: 40px;
                font-weight: bold;
                margin-top: 80px;
                margin-bottom: 40px;
            }

            .title span {
                margin-top: -20px;
            }

            .title img {
                width:15%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .input-group-text {
                width: 130px;
            }

            #btnCadastrar {
                float: right;
                background-color: #fff;
                color: #1868a0;
                font-size: 22px;
                font-weight: bold;
                border: none;
                border-bottom: 2px solid #e6d7d7;
            }

            .invalid-feedback {
                color: #fff;
                text-align: left;
                font-weight: bold;
            }
        </style>
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
    <script>

        montarOptions = (obj, cmp) => {
            let value = cmp === 'nome' ? obj.nome : obj.descricao; 
            let option = `
                            <option value="${obj.id}">${value}</option>
                        `;
            return option;
        }

        todosMedicos = () => {
            axios.get('/api/medicos')
                .then(function(response){
                    if(response.data) {
                        for(let i=0; i<response.data.length; i++) {
                            let option = montarOptions(response.data[i], 'nome');
                            $("#medico_id").append(option);
                        }
                    }
                });
        }

        todosPacientes = () => {
            axios.get('/api/pacientes')
                .then(function(response){
                    if(response.data) {
                        for(let i=0; i<response.data.length; i++) {
                            let option = montarOptions(response.data[i], 'nome');
                            $("#paciente_id").append(option);
                        }
                    }
                });
        }

        todosPostoColetas = () => {
            axios.get('/api/posto_coletas')
                .then(function(response){
                    if(response.data) {
                        for(let i=0; i<response.data.length; i++) {
                            let option = montarOptions(response.data[i], 'descricao');
                            $("#posto_coleta_id").append(option);
                        }
                    }
                });
        }

        todosExames = () => {
            axios.get('/api/exames')
                .then(function(response){
                    if(response.data) {
                        for(let i=0; i<response.data.length; i++) {
                            let option = montarOptions(response.data[i], 'descricao');
                            $("#exame_id").append(option);
                        }
                    }
                });
        }

        todosMedicos();
        todosPacientes();
        todosPostoColetas();
        todosExames();

        validateForm = (form) => {
            if(form) {
                let cmp_nulls = form.filter(function(item) {
                    return $("#"+item.name).val() === "";
                });
                
                if(cmp_nulls.length > 0) {
                    cmp_nulls.map(function(item) {
                        let label_cmp = $("#"+item.name).attr("data-name");
                        $("#"+item.name)
                                        .next()
                                        .html("<i class='fas fa-exclamation-triangle'></i> O campo "+label_cmp+" é obrigatório.")
                                        .css("display", "block");
                    });
                    return false;
                } else {
                    return true;
                }
            }
        }

        $("#form-ordem-servico").submit(function(e) {
            e.preventDefault();
            if(validateForm($("#form-ordem-servico").serializeArray())) {
                const ordem_servico = {
                    data: $("#data").val(),
                    paciente_id: $("#paciente_id").val(),
                    convenio: $("#convenio").val(),
                    posto_coleta_id: $("#posto_coleta_id").val(),
                    medico_id: $("#medico_id").val(),
                    exame_id: $("#exame_id").val()
                }
                axios.post('/api/ordem_servicos', ordem_servico)
                    .then((response) => {
                        if(response.data.insert == true) {
                            alert(response.data.message);
                            $("#form-ordem-servico")[0].reset();
                        } else {
                            alert(response.data.message);
                        }
                    });
            }
        });
        
    </script>  
    </body>
</html>
