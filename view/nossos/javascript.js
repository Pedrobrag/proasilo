var index = -1, 
imgAsilo = ["asilo1", "asilo2", "asilo3", "asilo4"], 
imgParceiro = ["parceiro1", "parceiro2", "parceiro3"]

function init() {
    if (paramExist("tipo")) {
        p = getParam("tipo")
        if (p != "voluntarios" && p != "instituicoes" && p != "parceiros") {
            window.location.href = "../"
        }
    } else {
        window.location.href = "../"
    }
    if (p == "voluntarios") {
        $(".tituloTela").text("Nossos voluntários")
    }
    if (p == "instituicoes") {
        $(".tituloTela").text("Nossas instituições")
    }
    if (p == "parceiros") {
        $(".tituloTela").text("Nossos parceiros")
    }
    pegarDados(p)
}

function pegarDados(tipo) {
    if (tipo == "voluntarios") {
        pegarTodosVoluntarios(function (resposta) {
            j = JSON.parse(resposta); 
            Object.keys(j).forEach(function(id) {
                nome = j[id]["nome"]
                j[id]["graduacao"] == "" ? graduacao = "SEM GRADUAÇÃO" : graduacao = j[id]["graduacao"]
                a = `
                <a target="_blank" href="../chat?desti=${id}&tipo=voluntario">
                    <div class="asilos pessoas" style="background-image: url('../icones/desconhecido.png');">
                        <div class="node">
                            <div class="nodeDiv">
                                <h5 class="asiloNome">${nome}</h5>
                                <h5 class="agencia">${graduacao}</h5>
                            </div>
                        </div>
                    </div>
                </a>
                `
                $("main").append(a)
            });
            if (Object.keys(j).length > 0) $(".nenhum").hide()
        })
    }
    if (tipo == "parceiros") {
        pegarTodosParceiros(function (resposta) {
            j = JSON.parse(resposta); 
            Object.keys(j).forEach(function(id) {
                nome = j[id]["nome"]
                index < (imgAsilo.length -1) ? index++ : index = 1
                a = `
                <a target="_blank" href="../chat?desti=${id}&tipo=parceiro">
                    <div class="asilos" style="background-image: url('../icones/${imgParceiro[index]}.jpg');">
                        <div class="node">
                            <div class="nodeDiv">
                                <h5 class="asiloNome">${nome}</h5>
                            </div>
                        </div>
                    </div>
                </a>
                `
                $("main").append(a)
            });
            if (Object.keys(j).length > 0) $(".nenhum").hide()
        })
    }
    if (tipo == "instituicoes") {
        pegarTodosAsilos(function (resposta) {
            j = JSON.parse(resposta); 
            Object.keys(j).forEach(function(id) {
                nome = j[id]["nome"]
                index < (imgAsilo.length -1) ? index++ : index = 1
                a = `
                <a target="_blank" href="../chat?desti=${id}&tipo=instituicao">
                    <div class="asilos" style="background-image: url('../icones/${imgAsilo[index]}.jpg');">
                        <div class="node">
                            <div class="nodeDiv">
                                <h5 class="asiloNome">${nome}</h5>
                            </div>
                        </div>
                    </div>
                </a>
                `
                $("main").append(a)
            });
            if (Object.keys(j).length > 0) $(".nenhum").hide()
        })
    }
}
