<?php include '../../model/autoloader.php';
    $db = new BancoDeDados();
    $ar = $db->pegarSessao();
    if ($ar == null) {
        header('location: ../../');
    }
?>
<html>

<head>
    <title>ProAsilo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../icones/icone1.png">
    <link rel="stylesheet" href="../libs/materialDesignIcons.css">
    <link rel="stylesheet" href="../libs/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/toastr.min.css">
    <link rel="stylesheet" href="../libs/nav.css">
    <link rel="stylesheet" href="./css.css">
    <script src="../libs/jquery.min.js"></script>
    <script src="../libs/popper.min.js"></script>
    <script src="../libs/bootstrap.min.js"></script>
    <script src="../libs/sweetalert2@8.js"></script>
    <script src="../libs/jquery.mask.min.js"></script>
    <script src="../libs/toastr.min.js"></script>
    <script src="../libs/utils.js"></script>
    <script src="../libs/nav.js"></script>
    <script src="./javascript.js"></script>
    <script src="../../controller/controller-carencia.js"></script>
    <script src="../../controller/controller-login.js"></script>
</head>

<body>
    <header>
        <div class="topBackground">
            <div class="mainNav">
                <div class="esquerdaNav">
                    <img src="../../view/icones/icone1-aparado.png" width="71" height="50">
                    <a class="navItens home" href="../../">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">home</i>
                            <div class="textNav">Início</div>
                        </div>
                    </a>
                </div>
                <div class="direitaNav">
                    <a class="navItens chat" href="../../view/chat">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">message</i>
                            <div class="textNav">Chat</div>
                        </div>
                    </a>
                    <a class="navItens entrar" data-placement="top" data-popover-content="#contentLogin" data-toggle="popover" href="javascript:void(0)">
                        <div class="divNavItens itemLogar">
                            <i class="material-icons iconsNav">input</i>
                            <div class="textNav">Entrar</div>
                        </div>
                    </a>

                    <a class="navItens usuario" id="drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="divNavItens itemUsuario">
                            <i class="material-icons iconsNav">face</i>
                            <div class="textNav textoUsuario"></div>
                        </div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="drop">
                        <a class="dropdown-item" href="../alterarDados">Alterar meus dados</a>
                        <a class="dropdown-item minhasCarencias" href="../../carencias">Ver minhas carências</a>
                        <a class="dropdown-item doacoes"></a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="logout();window.location.href='../../'">Finalizar sessão</a>
                    </div>
                </div>
            </div>
            <div class="divIcone">
                <div class="tituloTela">VISUALIZANDO CARÊNCIA</div>
            </div>
        </div>
    </header>
    <main>
        <div class="erro">ID INVÁLIDO</div>
        <div id="perg1" class="perg">Asilo: <div id="resp1" class="resp"></div>
        </div>
        <div id="perg2" class="perg">Descrição: <div id="resp2" class="resp"></div>
        </div>
        <div id="perg3" class="perg">Quantidade: <div id="resp3" class="resp"></div>
        </div>
        <div id="perg3" class="perg">Tipo: <div id="resp4" class="resp"></div>
        </div>
        <div id="perg4" class="perg">Estado: <div id="resp5" class="resp"></div>
        </div>
        <br>
        <a id="link">
            <button id="b1" type="button" class="btn btn-primary botao">Editar carência</button>
        </a>
        <button id="b2" type="button" class="btn btn-danger botao" onclick="excluir()">Excluir carência</button>
        <button id="b3" type="button" class="btn btn-primary botao" onclick="abrirDoar()">Doar para este asilo</button>
    </main>
    <footer>
        <h6 class="copyright">Copyright © - ProAsilo</h6>
        <h6 class="contato">contato@proasilo.com.br</h6>
    </footer>
    <script>
        <?php
        $tipo = $ar[1];
        echo("var tipo = '$tipo';");
        if($ar != null) {
            $tipo = $ar[1];
            $nome = $ar[2];
            echo("initMenu('$nome', '$tipo');");
        } else {
            echo("initMenu();");
        }
        ?>
        init()
    </script>
</body>

</html>