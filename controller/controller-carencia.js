function pegarCarencia(id, retorno, valido) {
    if(valido == null) {
        $.post('../../model/model-carencia.php', {
            pegarCarencia: true, id: id
        }, function (resposta) {
            retorno(resposta)
        });
    } else {
        $.post('../../model/model-carencia.php', {
            pegarCarencia: true, id: id, valida: true
        }, function (resposta) {
            retorno(resposta)
        });
    }
} 

function pegarMinhasCarencias(retorno) {
    $.post('../../model/model-carencia.php', {
        pegarMinhasCarencias: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodasCarencias(id, retorno, valido) {
    if(valido == null) {
        $.post('../../model/model-carencia.php', {
            pegarTodasCarencias: true, id: id
        }, function (resposta) {
            retorno(resposta)
        });
    } else {
        $.post('../../model/model-carencia.php', {
            pegarTodasCarencias: true, id: id, valida: true
        }, function (resposta) {
            retorno(resposta)
        });
    }
}

function postarCarencia(texto, qnt, tipo, retorno) {
    $.post('../../model/model-carencia.php', {
        adicionar: true, texto: texto, qnt: qnt, tipo: tipo
    }, function (resposta) {
        retorno(resposta)
    });
}

function editarCarencia(id, texto, qnt, tipo, retorno) {
    $.post('../../model/model-carencia.php', {
        editar: true, id: id, texto: texto, qnt: qnt, tipo: tipo
    }, function (resposta) {
        retorno(resposta)
    });
}

function excluirCarencia(id, retorno) {
    $.post('../../model/model-carencia.php', {
        excluir: true, id: id
    }, function (resposta) {
        retorno(resposta)
    });
}