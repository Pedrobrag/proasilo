var nome,email,senha,cpf,nascimento,estado,cidade,rua,bairro,numero,instituicaoEnsino,escolaridade,
semestre, graduacao,objetivo,motivos,cnpj,fundacao,descricao,faixaEtaria,numeroIdosos,funcionarios,projetos,agencia,cc

function trocarDados() {
    nome = $("#nome").val();
    email = $("#email").val();
    senha = $("#senha").val();
    cpf = $("#cpf").val();
    nascimento = $("#nascimento").val();
    estado = $("#uf").val();
    cidade = $("#cidade").val();
    rua = $("#rua").val();
    bairro = $("#bairro").val();
    numero = $("#numero").val();
    instituicaoEnsino = $("#instituicaoEnsino").val();
    escolaridade = $("#escolaridade").val();
    semestre = $("#semestre").val();
    graduacao = $("#graduacao").val();
    objetivo = $("#objetivo").val();
    motivos = $("#comentario").val();
    cnpj = $("#cnpj").val();
    fundacao = $("#fundacao").val();
    descricao = $("#descricao").val();
    faixaEtaria = $("#faixa").val();
    numeroIdosos = $("#idosos").val();
    funcionarios = $("#funcionarios").val();
    projetos = $("#projetos").val();
    agencia = $("#agencia").val();
    cc = $("#cc").val();
    fk = json["fk_id_endereco"];
    if(validar(tipo) != null) {
        toastr.options.timeOut = 1000;
        toastr.error(validar(tipo))
        return;
    }

    if (tipo == "voluntario") {
        $.post('../../model/model-trocarDados.php', {
            tipo: tipo, fk: fk, nome: nome, email: email, estado: estado, cidade: cidade, rua: rua, 
            bairro: bairro, cpf: cpf, nascimento: nascimento, instituicaoEnsino: instituicaoEnsino,
            escolaridade: escolaridade, semestre: semestre, graduacao: graduacao, objetivo:
                objetivo, motivos: motivos, senha: senha, numero: numero
        }, function (resposta) {
            toastr.options.timeOut = 1000;
            if(resposta == 1) {
                pegarDados()
                toastr.success('Dados alterados com sucesso!')
            } else {
                console.log(resposta)
                toastr.error('Erro ao trocar os dados')
            }
        });
    }
    if (tipo == "instituicao") {
        $.post('../../model/model-trocarDados.php', {
            tipo: tipo, fk: fk, nome: nome, email: email, estado: estado, cidade: cidade, rua: rua, bairro: bairro, cnpj: cnpj, fundacao: fundacao,
            descricao: descricao, objetivo: objetivo, senha: senha, numero: numero, faixaEtaria: faixaEtaria, numeroIdosos: numeroIdosos,
            funcionarios: funcionarios, projetos: projetos, agencia: agencia, cc: cc
        }, function (resposta) {
            toastr.options.timeOut = 1000;
            if(resposta == 1) {
                pegarDados()
                toastr.success('Dados alterados com sucesso!')
            } else {
                console.log(resposta)
                toastr.error('Erro ao trocar os dados')
            }
        });
    }
    if (tipo == "parceiro") {
        $.post('../../model/model-trocarDados.php', {
            tipo: tipo, fk: fk, nome: nome, email: email, estado: estado, cidade: cidade, rua: rua, bairro: bairro, cnpj: cnpj,
            descricao: descricao, objetivo: objetivo, senha: senha, numero: numero, funcionarios: funcionarios
        }, function (resposta) {
            toastr.options.timeOut = 1000;
            if(resposta == 1) {
                pegarDados()
                toastr.success('Dados alterados com sucesso!')
            } else {
                console.log(resposta)
                toastr.error('Erro ao trocar os dados')
            }
        });
    }
}

function validar(tipo) {
    if(tipo == "voluntario") {
        if(nome == "") {
            return "Campo 'nome' está vazio"
        }
        if(email == "") {
            return "Campo 'email' está vazio"
        }
        if(uf == "") {
            return "Campo 'estado' está vazio"
        }
        if(cidade == "") {
            return "Campo 'cidade' está vazio"
        }
        if(rua == "") {
            return "Campo 'rua' está vazio"
        }
        if(bairro == "") {
            return "Campo 'bairro' está vazio"
        }
        if(cpf == "") {
            return "Campo 'cpf' está vazio"
        }
        if(nascimento == "") {
            return "Campo 'nascimento' está vazio"
        }
        if(instituicaoEnsino == "") {
            return "Campo 'instituicão ensino' está vazio"
        }
        if(objetivo == "") {
            return "Campo 'objetivo' está vazio"
        }   
    }
    if(tipo == "instituicao") {
        if(nome == "") {
            return "Campo 'nome' está vazio"
        }
        if(email == "") {
            return "Campo 'email' está vazio"
        }
        if(uf == "") {
            return "Campo 'estado' está vazio"
        }
        if(cidade == "") {
            return "Campo 'cidade' está vazio"
        }
        if(rua == "") {
            return "Campo 'rua' está vazio"
        }
        if(bairro == "") {
            return "Campo 'bairro' está vazio"
        }
        if(cnpj == "") {
            return "Campo 'cnpj' está vazio"
        }
        if(fundacao == "") {
            return "Campo 'fundação' está vazio"
        }
        if(descricao == "") {
            return "Campo 'descrição' está vazio"
        }
        if(objetivo == "") {
            return "Campo 'objetivo' está vazio"
        }
        if(numero == "") {
            return "Campo 'numero' está vazio"
        }
        if(faixaEtaria == "") {
            return "Campo 'faixa etária' está vazio"
        }
        if(numeroIdosos == "") {
            return "Campo 'numero idosos etária' está vazio"
        }
        if(funcionarios == "") {
            return "Campo 'funcionários' está vazio"
        }
        if(projetos == "") {
            return "Campo 'projetos' está vazio"
        }
        if(agencia == "") {
            return "Campo 'agencia' está vazio"
        }
        if(cc == "") {
            return "Campo 'conta corrente' está vazio"
        }
    }
    if(tipo == "parceiro") {
        if(nome == "") {
            return "Campo 'nome' está vazio"
        }
        if(email == "") {
            return "Campo 'email' está vazio"
        }
        if(uf == "") {
            return "Campo 'estado' está vazio"
        }
        if(cidade == "") {
            return "Campo 'cidade' está vazio"
        }
        if(rua == "") {
            return "Campo 'rua' está vazio"
        }
        if(bairro == "") {
            return "Campo 'bairro' está vazio"
        }
        if(cnpj == "") {
            return "Campo 'cnpj' está vazio"
        }
        if(descricao == "") {
            return "Campo 'descrição' está vazio"
        }
        if(objetivo == "") {
            return "Campo 'objetivo' está vazio"
        }
        if(numero == "") {
            return "Campo 'numero' está vazio"
        }
        if(funcionarios == "") {
            return "Campo 'funcionários' está vazio"
        }
    }
    if($("#senha").val() != $("#ConfirmarSenha").val()) {
        return "A senha digitada está diferente do outro campo"
    }
    return null;
}