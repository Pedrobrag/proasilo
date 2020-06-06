var tipo, json, index = -1, num = 0, imgAsilo = ["asilo1", "asilo2", "asilo3", "asilo4"]

function init() {
    pegarTodasInstituicoes(function (resposta) {
        j = JSON.parse(resposta)
        Object.keys(j).forEach(function (id) {
            json = j[id]
            nome = json["nome"]
            agencia = json["agencia"]
            cc = json["cc"]
            renderNode(id, nome, agencia, cc)
        });
        numero = $(".asilos").length
        if(numero == 0) {
            $(".nada").show()
            $("main").css("justify-content", "center")
        }
    })
}

function renderNode(id, nome, agencia, cc) {
    index < (imgAsilo.length -1) ? index++ : index = 1
    a = `
    <div class="asilos" style="background-image: url('../icones/${imgAsilo[index]}.jpg');" onclick="irLista(${id})">
        <div class="node">
            <div class="nodeDiv">
                <h5 class="asiloNome">${nome}</h5>
                <div class="agencia">Agência: <br><b>${agencia}</b></div>
                <div class="cc">Conta bancária: <br><b>${cc}</b></div>
            </div>
        </div>
    </div>`
    $(".divAsilos").append(a)
}

function irAsilos() {
    $(".divAsilos").fadeIn(200)
    $(".carenciasLista").hide()
}

function irLista(id) {
    $(".divAsilos").hide()
    $(".carenciasLista").fadeIn(200)
    pegarTodasCarencias(id, function(resposta) {
        $(".tbody").empty();
        num = 0;
        json = JSON.parse(resposta)
        console.log(json)
        Object.keys(json).forEach(function (key) {
            j = json[key]
            nome = j["nome"]
            desc = j["desc"]
            qnt = j["qnt"] == null ? "SEM QUANTIDADE" : j["qnt"]
            t = j["tipo"] == 1 ? "voluntario" : "parceiro";
            if(t == tipo) {
                renderizarTabelaCarencia(key, nome, desc, qnt)
            }
        });
        if(num == 0) {
            $(".erro").show()
        } else {
            $(".erro").hide()
        }
    }, true)
}

function renderizarTabelaCarencia(id, nome, desc, qnt) {
    a = `
    <tr onclick="window.location.assign('../agendarCarencia?id=${id}')">
        <th>${nome}</th>
        <td>${desc}</td>
        <td>${qnt}</td>
    </tr>`
    $(".tbody").append(a)
    num++;
}