@section('js')
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

    montarLinha = (ordem_servico) => {
        let linha = `
                        <tr>
                            <td>${ordem_servico.id}</td>
                            <td>${ordem_servico.paciente_nome}</td>
                            <td>${ordem_servico.convenio}</td>
                            <td>${ordem_servico.medico_nome}</td>
                            <td>${ordem_servico.exame_descricao}</td>
                            <td>${ordem_servico.preco}</td>
                            <td>${ordem_servico.posto_coleta_descricao}</td>
                        </tr>
                    `;
        return linha;
    }

    todasOrdensServicos = () => {
        axios.get('/api/ordem_servicos')
            .then((response) => {
                if(response.data) {
                    for(let i=0; i<response.data.length; i++) {
                        let linha = montarLinha(response.data[i]);
                        $("#tableOrdens > tbody").append(linha);
                    }
                }
            });
    }

    todosMedicos();
    todosPacientes();
    todosPostoColetas();
    todosExames();
    todasOrdensServicos();

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
                        linha = montarLinha(response.data);
                        $("#tableOrdens > tbody").append(linha);
                    } else {
                        alert(response.data.message);
                    }
                });
        }
    });

</script>  
@endsection