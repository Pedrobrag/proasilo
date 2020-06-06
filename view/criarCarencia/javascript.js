var json, editar = false

function init() {
    if (!paramExist("editar")) {
        $(".tituloTela").text("CRIAR CARÊNCIA")
    } else {
        editar = true;
        $(".tituloTela").text("EDITAR CARÊNCIA")
        id = getParam("editar")
        pegarCarencia(id, function (resposta) {
            json = JSON.parse(resposta)
            $("#carencia").val(json["desc"])
            $("#qnt").val(json["qnt"])
            json["tipo"] == "0" ? $("#radio1").prop("checked", true) : $("#radio2").prop("checked", true)
        })
    }
}

function toggleQnt(toggle) {
    toggle ? $("#qnt").attr("disabled", true) : $("#qnt").removeAttr("disabled", true)
}

function submit() {
    if ($("#carencia").val().length > 0) {
        if (!editar) {
            texto = $("#carencia").val()
            qnt = $("#qnt").val()
            tipo = $('#radio1').is(':checked') ? '0' : '1'
            postarCarencia(texto, qnt, tipo, function (resposta) {
                toastr.options.timeOut = 1000;
                if (resposta == 1) {
                    window.location.href = "../carencias?criado"
                } else {
                    toastr.error('Erro ao criar a carência!')
                    console.log(resposta)
                }
            })
        } else {
            id = getParam("editar")
            texto = $("#carencia").val()
            qnt = $("#qnt").val()
            tipo = $('#radio1').is(':checked') ? '0' : '1'
            editarCarencia(id, texto, qnt, tipo, function (resposta) {
                toastr.options.timeOut = 1000;
                if (resposta == 1) {
                    window.location.href = "../carencias?editado"
                } else {
                    toastr.error('Erro ao editar a carência!')
                    console.log(resposta)
                }
            })
        }
    }
}