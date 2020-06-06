var json

function init() {
    carregarDados()
}

function carregarDados() {
    pegarMinhasDoacoes(function (resposta) {
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
        if(estado == 0) {
            estado = "Doação recusada"
        }
        if(estado == 1) {
            estado = "Esperando confirmação"
        }
        if(estado == 2) {
            estado = "Doação aceita"
        }
        a = `
        <tr>
            <th>${nome}</th>
            <td>${desc}</td>>
            <td>${qnt}</td>
            <td>${data}</td>
            <td>${estado}</td>
        </tr>
        `
        $(".tbody").append(a)
    });
}