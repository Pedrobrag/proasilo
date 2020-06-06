function pegarTodosDados(retorno) {
    $.get('../../model/model-usuario.php', {
        pegarTodosDados: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodosUsuarios(retorno) {
    $.get('../../model/model-usuario.php', {
        todos: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodosVoluntarios(retorno) {
    $.get('../../model/model-usuario.php', {
        voluntarios: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodosParceiros(retorno) {
    $.get('../../model/model-usuario.php', {
        parceiro: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodasInstituicoes(retorno) {
    $.get('../../model/model-usuario.php', {
        pegarTodasInstituicoes: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodosAsilos(retorno) {
    $.get('../../model/model-usuario.php', {
        asilos: true
    }, function (resposta) {
        retorno(resposta)
    });
}

