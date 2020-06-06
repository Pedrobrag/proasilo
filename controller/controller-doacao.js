function enviarDoacao(carencia, data, quantidade, retorno) {
    $.post('../../model/model-doacao.php', {
        enviarDoacao: true, carencia: carencia, data: data, quantidade: quantidade
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarTodasDoacoesRecebidas(retorno) {
    $.post('../../model/model-doacao.php', {
        pegarTodasDoacoesRecebidas: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function pegarMinhasDoacoes(retorno) {
    $.post('../../model/model-doacao.php', {
        pegarMinhasDoacoes: true
    }, function (resposta) {
        retorno(resposta)
    });
}

function aceitarDoacao(id, retorno) {
    $.post('../../model/model-doacao.php', {
        aceitar: id
    }, function (resposta) {
        retorno(resposta)
    });
}

function recusarDoacao(id, retorno) {
    $.post('../../model/model-doacao.php', {
        recusar: id
    }, function (resposta) {
        retorno(resposta)
    });
}