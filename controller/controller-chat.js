function baixarMSG(id, tipo, retorno) {
    $.post('../../model/model-chat.php', {
        pegarMSG: true, id: id, tipo: tipo
    }, function (resposta) {
        retorno(resposta)
    });
}

function enviarMsg(msg, id, tipo, retorno) {
    $.post('../../model/model-chat.php', {
        enviarMSG: true, msg: msg, idDesti: id, tipoDesti: tipo
    }, function (resposta) {
        retorno(resposta)
    });
}