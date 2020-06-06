var json, editar = false

function init() {
    if (paramExist("id")) {
        id = getParam("id")
        pegarCarencia(id, function (resposta) {
            if (resposta != "null") {
                json = JSON.parse(resposta)
                var valido = false
                if (tipo == "parceiro" && json["tipo"] == 0) {
                    valido = true
                    $(".parceiro").show()
                    $("#quantidade").val(json["qnt"])
                }
                if (tipo == "voluntario" && json["tipo"] == 1) {
                    valido = true
                    $('#data').mask("00/00/0000 00:00", {placeholder: "__/__/____ hh/mm"});
                    $(".voluntarios").show()
                }
                if (!valido) window.location.href = "../../"

                $("#resp1").text(json["nome"])
                $("#resp2").text(json["desc"])
                $("#resp3").text(json["qnt"] == null ? "SEM QUANTIDADE" : json["qnt"])
                $("#resp4").text(json["tipo"] == 0 ? "Insumo" : "Serviço")
            } else {
                $("main").empty()
                $(".invalido").show()
            }
        }, true)
    } else {
        window.location.href = "../../"
    }
}

function mandarDoacao() {
    toastr.options.timeOut = 2000;
    if(tipo == "parceiro") {
        qnt = $("#quantidade").val()
        enviarDoacao(id, null, qnt, function(resposta) {
            if(resposta == "1") {
                window.location.href="../minhasDoacoes"
            } else {
                toastr.error('Erro ao agendar!')
            }
        })
    }
    if(tipo == "voluntario") {
        data = $("#data").val()
        enviarDoacao(id, data, null, function(resposta) {
            if(resposta == "1") {
                window.location.href="../minhasDoacoes"
            } else {
                toastr.error('Erro ao agendar!')
            }
        })
    }
}