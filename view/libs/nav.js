var tipo, nome, popoverLoad = false;

function initMenu(n, t) {
    tipo = t
    nome = n
    if(n == null || t == null) {
        if(!popoverLoad) loadPopover()
    } else {
        carregarUsuario()
    }
}

function loadPopover() {
    $(document).ready(function () {
        $("[data-toggle=popover]").popover({
            html: true,
            sanitize: false,
            content: function () {
                return `
                <div class="loginForm">
                    <h4 class="tituloLogin">Efetuar login</h4>
                    <input id="email" class="inputLogin inputEmail" spellcheck="false" type="text" placeholder="Digite seu email">
                    <input id="senha" class="inputLogin" spellcheck="false" type="password" placeholder="Digite sua senha">
                    <button onclick="logar()" class="botao botao-login btn btn-success">Realizar login</button>
                </div>`
            }
        });
    });
    $("[data-toggle='popover']").on('shown.bs.popover', function () {
        $("#email").focus()
        $("#email, #senha").on('keypress',function(e) {
            if(e.which == 13) {
                if(this.id == "email") $("#senha").focus()
                if(this.id == "senha") $(".botao-login").click()
            }
        });
    });
}

function carregarUsuario() {
    $(".entrar").hide()
    $(".cadastrase").hide()
    $(".chat").show()
    $(".usuario").show()
    $(".usuario").addClass("cadastroRight")
    $(".textoUsuario").text(nome)
    if (tipo == "instituicao") {
        $(".minhasCarencias").show()
        $(".doacoes").text("Ver doações")
        $(".doacoes").attr("href", "../../view/doacoes")
    } else {
        $(".doacoes").text("Ver minhas doações")
        $(".doacoes").attr("href", "../../view/minhasDoacoes")
    }
}

function removerUsuario() {
    $(".entrar").show()
    $(".cadastrase").show()
    $(".usuario").hide()
    $(".usuario").removeClass("cadastroRight")
    $(".textoUsuario").text("")
    if(!popoverLoad) loadPopover()
}

