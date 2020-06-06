var json

function init() {
    if (paramExist("id")) {
        id = getParam("id")
        pegarCarencia(id, function (resposta) {
            if (resposta != "null") {
                json = JSON.parse(resposta)
                $("#resp1").text(json["nome"])
                $("#resp2").text(json["desc"])
                $("#resp3").text(json["qnt"] == null ? "SEM QUANTIDADE" : json["qnt"])
                $("#resp4").text(json["tipo"] == 0 ? "Insumo" : "Serviço")
                $("#resp5").text(json["estado"] == 0 ? "Em aberto" : "Já agendado")
            } else {
                $("main > *").hide()
                $("main").css("justify-content", "center")
                $(".erro").show()
            }
        })
        $("#link").attr("href", "../criarCarencia?editar=" + id)
    } else {
        window.location.href = "../carencias"
    }
    if (tipo == "instituicao") {
        $("#b3").hide()
    } else {
        $("#b1").hide()
        $("#b2").hide()
    }
}

function excluir() {
    id = getParam("id")
    excluirCarencia(id, function (resposta) {
        toastr.options.timeOut = 1000;
        if (resposta == 1) {
            window.location.href = "../carencias?excluido"
        } else {
            toastr.error('Erro ao excluir a carência!')
            console.log(resposta)
        }
    })
}