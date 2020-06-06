var json

function init() {
    if(tipo == "instituicao") {
        pegarMinhasCarencias(function(resposta) {
            if(resposta != "[]") {
                json = JSON.parse(resposta)
                renderizarTabelaCarencia()
            } else {
                $(".erro").show()
            }
        })
    }
    popups()
}

function renderizarTabelaCarencia() {
    Object.keys(json).forEach(function (key) {
        j = json[key]
        nome = j["nome"]
        desc = j["desc"]
        qnt = j["qnt"] == null ? "SEM QUANTIDADE" : j["qnt"]
        t = j["tipo"] == 0 ? "Insumo(s)" : "Serviço(s)";
        if(j["estado"] == 0) {
            estado = "Em aberto"
        } 
        if(j["estado"] == 1) {
            estado = "Esperando confirmação"
        } 
        if(j["estado"] == 2) {
            estado = "Carência satisfeita"
        }   
        a = `
        <tr onclick="window.location.assign('../verCarencia?id=${key}')">
            <th>${nome}</th>
            <td>${desc}</td>
            <td>${qnt}</td>
            <td>${t}</td>
            <td>${estado}</td>
        </tr>
        `
        $(".tbody").append(a)
    });
}

function popups() {
    toastr.options.timeOut = 2000;
    if(paramExist("criado")) {
        toastr.success('Carência criada com sucesso!')
    }
    if(paramExist("editado")) {
        toastr.success('Carência editada com sucesso!')
    }
    if(paramExist("excluido")) {
        toastr.success('Carência excluída com sucesso!')
    }
    removeAllParans()
}