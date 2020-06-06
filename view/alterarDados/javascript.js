var json;

function pegarDados() {
    pegarTodosDados(function(resposta) {
        json = JSON.parse(resposta)
        mostrar()
    })
}

function mostrar() {
    $(".mainForm").fadeIn(500);
    $(".form").hide()

    $("#nome").val(json["nome"])
    $("#email").val(json["email"])
    $("#uf").val(json["estado"])
    $("#cidade").val(json["cidade"])
    $("#bairro").val(json["bairro"])
    $("#rua").val(json["rua"])
    $("#numero").val(json["numero"])

    if (tipo == "voluntario") {
        $("[voluntario]").show()
        $("#cpf").mask("000.000.000-00", { reverse: true });
        $("#nascimento").mask("00/00/0000");
        $("#semestre").mask("00");

        $("#cpf").val(json["cpf"])
        $("#nascimento").val(json["data_nascimento"])
        $("#instituicaoEnsino").val(json["instituicao_ensino"])
        $("#escolaridade").val(json["escolaridade"])
        $("#semestre").val(json["semestre"])
        if(json["area_graduacao"] != "") {
            $("#graduacao").val(json["area_graduacao"])
        }
        $("#objetivo").val(json["objetivo"])
        $("#comentario").val(json["explicacao"])
    }
    if (tipo == "instituicao") {
        $('[instituicao]').show()
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#fundacao").mask("00/00/0000");
        $("#faixa").mask("00-00");
        $("#idosos, .funcionarios").mask("00000");

        $("#cnpj").val(json["cnpj"])
        $("#objetivo").val(json["objetivo"])
        $("#fundacao").val(json["ano_fundacao"])
        $("#idosos").val(json["numero_idosos"])
        $("#funcionarios").val(json["numero_funcionarios"])
        $("#projetos").val(json["projetos_andamento"])
        $("#faixa").val(json["faixa_etaria"])
        $("#descricao").val(json["descricao"])
        $("#agencia").val(json["agencia"])
        $("#cc").val(json["cc"])
    }
    if (tipo == "parceiro") {
        $('[parceiro]').show()
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#fundacao").mask("00/00/0000");
        $("#funcionarios").mask("00000");

        $("#cnpj").val(json["cnpj"])
        $("#funcionarios").val(json["numero_funcionarios"])
        $("#projetos").val(json["projetos_andamento"])
        $("#objetivo").val(json["objetivo"])
        $("#descricao").val(json["descricao"])
    }
    $('#nome, #email, #cidade, #bairro, #rua, #instituicaoEnsino, #objetivo, #comentario, #descricao').mask(
        'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            'A': {
                pattern: /[\W*(?:\w+\b\W*){1,100}]/, optional: false
            }
        }
    });
}