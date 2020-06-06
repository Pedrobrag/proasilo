<?php include 'autoloader.php'; 
    if(isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
        if($tipo == "voluntario") {
            //return empty($_POST['graduacao']);
            //return print_r($_POST);
            //return "-- " . $_POST['graduacao'];
            $v = new Voluntario();
            if(empty($_POST['fk'])){ echo 0; exit; } else{ $fk = $v->proteger($_POST['fk']); }
            if(empty($_POST['nome'])){ echo 0; exit; } else{ $nome = $v->proteger($_POST['nome']); }
            if(empty($_POST['email'])){ echo 0; exit; } else{ $email = $v->proteger($_POST['email']); }
            if(empty($_POST['cpf'])){ echo 0; exit; } else{ $cpf = $v->proteger($_POST['cpf']); }
            if(empty($_POST['senha'])){ $senha=null; } else{ $senha = $v->proteger($_POST['senha']); }
            if(empty($_POST['nascimento'])){ echo 0; exit; } else{ $nascimento = $v->proteger($_POST['nascimento']); }
            if(empty($_POST['estado'])){ echo 0; exit; } else{ $estado = $v->proteger($_POST['estado']); }
            if(empty($_POST['rua'])){ echo 0; exit; } else{ $rua = $v->proteger($_POST['rua']); }
            if(empty($_POST['bairro'])){ echo 0; exit; } else{ $bairro = $v->proteger($_POST['bairro']); }
            if(empty($_POST['cidade'])){ echo 0; exit; } else{ $cidade = $v->proteger($_POST['cidade']); }
            if(empty($_POST['numero'])){ echo 0; exit; } else{ $numero = $v->proteger($_POST['numero']); }
            if(empty($_POST['instituicaoEnsino'])){ echo 0; exit; } else{ $instituicaoEnsino = $v->proteger($_POST['instituicaoEnsino']); }
            if(empty($_POST['escolaridade'])){ echo 0; exit; } else{ $escolaridade = $v->proteger($_POST['escolaridade']); }
            if(empty($_POST['objetivo'])){ echo 0; exit; } else{ $objetivo = $v->proteger($_POST['objetivo']); }
            if(empty($_POST['motivos'])){ echo 0; exit; } else{ $motivos = $v->proteger($_POST['motivos']); }
            if(($escolaridade === "Ensino superior completo") || ($escolaridade === "Ensino superior incompleto") ){
                if($escolaridade === "Ensino superior completo" && empty($_POST['graduacao']) || $_POST['graduacao'] == "NENHUMA DAS OPÇÕES") {
                   echo 0; exit;
                }
                if($escolaridade === "Ensino superior incompleto" && (empty($_POST['graduacao']) || empty($_POST['semestre'])
                || $_POST['graduacao'] == "NENHUMA DAS OPÇÕES")) {
                    echo 0; exit;
                }
                if(!empty($_POST['semestre'])){
                    $semestre = $_POST['semestre'];
                } else {
                    $semestre = "";
                }
                if (!empty($_POST['graduacao'])) {
                    $graduacao = $_POST['graduacao'];
                } else {
                    $graduacao = "";
                }
            } else{
                $semestre = "";
                $graduacao = "";
            }
            $end = new Endereco();
            $idEndereco = $end->atualizar($fk, $estado, $cidade, $bairro, $rua, $numero);
            if($idEndereco == 0) {
                echo $idEndereco;
                exit;
            }
            $id = $v->pegarSessao()[0];
            $v->criar($nome, $email, $senha, $cpf, $nascimento, $instituicaoEnsino, 
            $escolaridade, $semestre, $graduacao, $objetivo, $motivos, $idEndereco, $id);
            $result = $v->atualizar();
            echo $result;
        }
        if($tipo == "instituicao") {
            $i = new Instituicao();
            if(empty($_POST['fk'])){ echo 0; exit; } else{ $fk = $i->proteger($_POST['fk']); }
            if(empty($_POST['nome'])){ echo 0; exit; } else{ $nome = $i->proteger($_POST['nome']); }
            if(empty($_POST['email'])){ echo 0; exit; } else{ $email = $i->proteger($_POST['email']); }
            if(empty($_POST['senha'])){ $senha=null; } else{ $senha = $v->proteger($_POST['senha']); }
            if(empty($_POST['cnpj'])){ echo 0; exit; } else{ $cnpj = $i->proteger($_POST['cnpj']); }
            if(empty($_POST['fundacao'])){ echo 0; exit; } else{ $fundacao = $i->proteger($_POST['fundacao']); }
            if(empty($_POST['estado'])){ echo 0; exit; } else{ $estado = $i->proteger($_POST['estado']); }
            if(empty($_POST['cidade'])){ echo 0; exit; } else{ $cidade = $i->proteger($_POST['cidade']); }
            if(empty($_POST['rua'])){ echo 0; exit; } else{ $rua = $i->proteger($_POST['rua']); }
            if(empty($_POST['bairro'])){ echo 0; exit; } else{ $bairro = $i->proteger($_POST['bairro']); }
            if(empty($_POST['numero'])){ echo 0; exit; } else{ $numero = $i->proteger($_POST['numero']); }
            if(empty($_POST['objetivo'])){ echo 0; exit; } else{ $objetivo = $i->proteger($_POST['objetivo']); }
            if(empty($_POST['descricao'])){ echo 0; exit; } else{ $descricao = $i->proteger($_POST['descricao']); }
            if(empty($_POST['faixaEtaria'])){ echo 0; exit; } else{ $faixaEtaria = $i->proteger($_POST['faixaEtaria']); }
            if(empty($_POST['numeroIdosos'])){ echo 0; exit; } else{ $numeroIdosos = $i->proteger($_POST['numeroIdosos']); }
            if(empty($_POST['funcionarios'])){ echo 0; exit; } else{ $funcionarios = $i->proteger($_POST['funcionarios']); }
            if(empty($_POST['projetos'])){ echo 0; exit; } else{ $projetos = $i->proteger($_POST['projetos']); }
            if(empty($_POST['agencia'])){ $agencia = null; } else{ $agencia = $i->proteger($_POST['agencia']); }
            if(empty($_POST['cc'])){ $cc = null; } else{ $cc = $i->proteger($_POST['cc']); }
            $end = new Endereco();
            $idEndereco = $end->atualizar($fk, $estado, $cidade, $bairro, $rua, $numero);
            if($idEndereco == 0) {
                echo $idEndereco;
                exit;
            }
            $id = $i->pegarSessao()[0];
            $i->criar($nome, $email, $senha, $cnpj, $fundacao, $numeroIdosos, $faixaEtaria, 
            $funcionarios, $projetos, $objetivo, $descricao, $idEndereco, $id, $agencia, $cc);
            $result = $i->atualizar();
            echo $result;
        }
        if($tipo == "parceiro") {
            $p = new Parceiro();
            if(empty($_POST['fk'])){ echo 0; exit; } else{ $fk = $p->proteger($_POST['fk']);}
            if(empty($_POST['nome'])){ echo 0; exit; } else{ $nome = $p->proteger($_POST['nome']);}
            if(empty($_POST['email'])){ echo 0; exit; } else{ $email = $p->proteger($_POST['email']);}
            if(empty($_POST['senha'])){ $senha=null; } else{ $senha = $p->proteger($_POST['senha']); }
            if(empty($_POST['cnpj'])){ echo 0; exit; } else{ $cnpj = $p->proteger($_POST['cnpj']);}
            if(empty($_POST['estado'])){ echo 0; exit; } else{ $estado = $p->proteger($_POST['estado']);}
            if(empty($_POST['cidade'])){ echo 0; exit; } else{ $cidade = $p->proteger($_POST['cidade']);}
            if(empty($_POST['rua'])){ echo 0; exit; } else{ $rua = $p->proteger($_POST['rua']);}
            if(empty($_POST['bairro'])){ echo 0; exit; } else{ $bairro = $p->proteger($_POST['bairro']);}
            if(empty($_POST['numero'])){ echo 0; exit; } else{ $numero = $p->proteger($_POST['numero']);}
            if(empty($_POST['objetivo'])){ echo 0; exit; } else{ $objetivo = $p->proteger($_POST['objetivo']);}
            if(empty($_POST['descricao'])){ echo 0; exit; } else{ $descricao = $p->proteger($_POST['descricao']);}
            if(empty($_POST['funcionarios'])){ echo 0; exit; } else{ $funcionarios = $p->proteger($_POST['funcionarios']);}
            $end = new Endereco();
            $idEndereco = $end->atualizar($fk, $estado, $cidade, $bairro, $rua, $numero);
            if($idEndereco == 0) {
                echo 0;
                exit;
            }
            $id = $p->pegarSessao()[0];
            $p->criar($nome, $email, $senha, $cnpj, $funcionarios, $objetivo, $descricao, $idEndereco, $id);
            $result = $p->atualizar();
            echo $result;
        }
    }
?>