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
    <script src="../libs/jquery.mask.min.js"></script>
    <script src="../libs/toastr.min.js"></script>
    <script src="../libs/utils.js"></script>
    <script src="../libs/nav.js"></script>
    <script src="./javascript.js"></script>
    <script src="../../controller/controller-chat.js"></script>
    <script src="../../controller/controller-usuario.js"></script>
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
                    <a class="navItens doeja" href="../../view/doeja">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">monetization_on</i>
                            <div class="textNav">Doe já</div>
                        </div>
                    </a>
                </div>
                <div class="direitaNav">
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
                        <a class="dropdown-item minhasCarencias" href="../carencias">Ver minhas carências</a>
                        <a class="dropdown-item doacoes"></a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="logout();window.location.href='../../'">Finalizar sessão</a>
                    </div>

                    <a href="./view/cadastro" class="navItens cadastrase">Cadastre-se</a>
                </div>
            </div>
            <div class="divIcone">
                <div class="tituloTela">CHAT</div>
            </div>
        </div>
    </header>
    <main>
        <div class="divMain">
            <div class="left">
                <div class="top">
                    <img class="imgUser" src="../icones/desconhecido.png" width="40" height="40">
                    <h1 class="userName">Nome</h1>
                </div>
                <div class="divPesquisa">
                    <input class="form-control pesquisa" type="text" placeholder="Pesquise por um usuário">
                </div>
                <div class="tableDiv">
                    <div class="userErro">Nenhum usuário encontrado</div>
                    <table class="tabelaUser">
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right">
                <div class="topRight">
                    <img class="imgUser" src="../icones/desconhecido.png" width="40" height="40">
                    <div class="destiNome">
                        <div class="nomeDesti"></div>
                        <div class="tipoDesti"></div>
                    </div>
                </div>
                <div class="divMSG">
                </div>
                <div class=bottom>
                    <input class="digitar" type="text" placeholder="Digite algo">
                    <button onclick="enviar()" class="enviar">Enviar</button>
                </div>       
            </div>
        </div>
    </main>
    <footer>
        <h6 class="copyright">Copyright © - ProAsilo</h6>
        <h6 class="contato">contato@proasilo.com.br</h6>
    </footer>
    <script>
        <?php
        if ($ar != null) {
            $tipo = $ar[1];
            $nome = $ar[2];
            echo("initMenu('$nome', '$tipo');");
            echo("init('$nome');");
        } else {
            echo('initMenu();');
        }
        ?>
    </script>
</body>

</html>