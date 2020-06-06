var json, total = 0, selecionado = -1;

function init() {
    carregarDados()
}

function carregarDados() {
    pegarTodasDoacoesRecebidas(function (resposta) {
        $("tbody").empty()
        if (resposta != "[]") {
            json = JSON.parse(resposta)
            renderizarTabelaCarencia()
        } else {
            $(".erro").show()
        }
    })
}

function renderizarTabelaCarencia() {
    Object.keys(json).forEach(function (key) {
        j = json[key]
        nome = j["nome"]
        desc = j["desc"]
        qnt = j["quantidade"] == null ? "SEM QUANTIDADE" : j["quantidade"]
        data = j["data"] == null ? "SEM DATA" : j["data"]
        estado = j["estado"]
        tt = ""
        if(estado == 0) {
            estado = "Doação recusada"
        }
        if(estado == 1) {
            estado = "Esperando confirmação"
            tt = `onclick="toggle(${total})`
        }
        if(estado == 2) {
            estado = "Doação aceita"
        }
        a = `
        <tr id="tr-${total}" key="${key}" ${tt}">
            <th>${nome}</th>
            <td>${desc}</td>>
            <td>${qnt}</td>
            <td>${data}</td>
            <td>${estado}</td>
        </tr>
        `
        $(".tbody").append(a)
        total++;
    });
}

function toggle(id) {
    e = $("#tr-" + id);
    if(e.hasClass("select")) {
        e.removeClass("select")
        selecionado = -1;
        $(".botao").attr("disabled", true)
    } else {
        $("tr").removeClass("select")
        selecinado = id;
        e.addClass("select")
        $(".botao").removeAttr("disabled")
    }
}

function aceitar() {
    id = $(".select").attr("key")
    aceitarDoacao(id, function(resposta) {
        toastr.options.timeOut = 2000;
        if(resposta == 1) {
            carregarDados()
            toastr.success('Doação aceita com sucesso!')
        } else {
            toastr.error('Erro ao aceitar a doação!')
        }
    })
}

function recusar() {
    id = $(".select").attr("key")
    recusarDoacao(id, function(resposta) {
        toastr.options.timeOut = 2000;
        if(resposta == 1) {
            carregarDados()
            toastr.success('Doação recusada com sucesso!')
        } else {
            toastr.error('Erro ao recusar a doação!')
        }
    })
}