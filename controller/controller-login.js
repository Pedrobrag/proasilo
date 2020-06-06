function logar() {
    $("#contentLogin").empty()
    email = $("#email").val()
    senha = $("#senha").val()
    if(email.length == 0 || senha.length == 0) return
    $(".botao").attr("disabled", true)
    $(".botao").text("VERIFICANDO...")
    $("#erro").text("")
    $.post('../../model/model-login.php', {
        email: email, senha: senha
    }, function (resposta) {
        if (resposta == "{}") {
            toastr.error('Usuário ou senha incorreto(s)')
        } else {
            $('[data-toggle=popover]').popover('hide');
            json = JSON.parse(resposta)
            nome = json["nome"]
            tipo = json["tipo"]
            carregarUsuario()
            if(json["tipo"] == "instituicao") {
                $(".minhasCarencias").show()
            } else {
                $(".minhasCarencias").hide()
            }
            toastr.options.timeOut = 1000;
            toastr.success('Seja bem vindo <br> ' + json["nome"], 'Logado com sucesso!')
        }
        $(".botao").removeAttr("disabled")
        $(".botao").text("Realizar login")
    });
}

function logout() {
    $.post('../../model/model-login.php', {
        finalizar: true
    }, function (resposta) {
        removerUsuario()
        toastr.options.timeOut = 1000;
        toastr.success('Sessão finalizada com sucesso!')
    });
}