IDSelecionado = null, tipoSelecionado = null, i = 0

function init(nome) {
    $(".userName").text(nome)
    eventos()
    baixarUsuarios()
    baixar()
}

function getURL() {
    if(paramExist("desti") && paramExist("tipo")) {
        id = getParam("desti")
        tipo = getParam("tipo")
        $(`[iduser='${id}'][tipoUser='${tipo}']`).trigger("click")
    }
}

function eventos() {
    $(".digitar").keyup(function (e) {
        if (e.keyCode == 13) {
            enviar()
        }
    });
    $(".pesquisa").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".tabelaUser tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("tr:visible").length == 0 ? $(".userErro").show() : $(".userErro").hide()
    });
}

function baixarUsuarios() {
    pegarTodosUsuarios(function (resposta) {
        j = JSON.parse(resposta)
        Object.keys(j).forEach(function (nome) {
            id = j[nome]["id"]
            tipo = j[nome]["tipo"]
            a = `
            <tr idUser='${id}' tipoUser='${tipo}' id="tr-${i}" class="trUser" onclick="selectUser(${i}, ${id}, '${tipo}', '${nome}')">
                <td class="tdUser">
                <img style="margin-left:0px;margin-right:5px" class="imgUser" src="../icones/desconhecido.png" width="40" height="40">
                ${nome}
                </td>
            </tr>
            `
            $("tbody").append(a)
            i++;
        });
        getURL()
    })
}


function selectUser(index, id, tipo, nome) {
    $("tr").removeClass("select")
    $(`#tr-${index}`).addClass("select")
    IDSelecionado = id
    tipoSelecionado = tipo
    idNode = 1
    $(".divMSG").empty()
    $(".bottom, .topRight").show()
    $(".nomeDesti").text(nome)
    if(tipo == "voluntario") {
        $(".tipoDesti").text("Voluntário")
    }
    if(tipo == "parceiro") {
        $(".tipoDesti").text("Parceiro")
    }
    if(tipo == "instituicao") {
        $(".tipoDesti").text("Instituição")
    }
}

function baixar() {
    setTimeout(function () {
        if (IDSelecionado != null && tipoSelecionado != null) {
            baixarMSG(IDSelecionado, tipoSelecionado, function (resposta) {
                json = JSON.parse(resposta)
                Object.keys(json).forEach(function (value) {
                    j = json[value]
                    msg = j["msg"]
                    nomeRemetente = j["remetente"]
                    sua = j["sua"]
                    data = j["data"]
                    render(value, msg, nomeRemetente, data, sua)
                });
            })
        }
        baixar()
    }, 2000);
}

function enviar() {
    msg = $(".digitar").val()
    if (msg != "") {
        enviarMsg(msg, IDSelecionado, tipoSelecionado, function (resposta) {
        })
        $(".digitar").val("")
    }
}

function render(id, msg, nomeRemetente, data, sua) {
    if ($(`#div-${id}`).length == 0) {
        direita = "";
        if (sua != true) {
            direita = "direita"
        }
        a = `
        <div id="div-${id}" class="linhaMSG ${direita}">
            <div class="msgNode">
                <div class="userNome">${nomeRemetente}</div>
                <div class="horario">${data}</div>
                <hr>
                <div class="msgTexto">${msg}</div>
            </div>
        </div>
        `
        $(".divMSG").append(a)
        $(".divMSG").scrollTop(1000000)
    }
}