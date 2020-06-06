var type

function irParte1(tipo) {
    tipo = tipo
    $(".parte1").fadeIn(500)
    $(".parte2").hide()
    $("input").val("")
}

function irParte2(tipo) {
    type = tipo
    $(".form").hide()
    if (tipo == "voluntario") {
        $("[voluntario]").show()
        $("#cpf").mask("000.000.000-00", { reverse: true });
        $("#nascimento").mask("00/00/0000");
        $("#semestre").mask("00");
    }
    if (tipo == "instituicao") {
        $('[instituicao]').show()
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#fundacao").mask("00/00/0000");
        $("#faixa").mask("00-00");
        $("#idosos, .funcionarios").mask("00000");
    }
    if (tipo == "parceiro") {
        $('[parceiro]').show()
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#fundacao").mask("00/00/0000");
        $("#funcionarios").mask("00000");
    }
    $('#nome, #email, #cidade, #bairro, #rua, #instituicaoEnsino, #objetivo, #comentario, #descricao').mask(
        'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            'A': {
                pattern: /[\W*(?:\w+\b\W*){1,100}]/, optional: false
            }
        }
    });
    $(".parte1").hide()
    $(".parte2").fadeIn(500)
}