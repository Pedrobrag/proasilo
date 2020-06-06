<?php include '../../model/autoloader.php';
    $db = new BancoDeDados();
    $ar = $db->pegarSessao();
    if ($ar == null || $ar[1] == 'instituicao') {
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
    <link rel="stylesheet" href="./css.css">
    <script src="../libs/jquery.min.js"></script>
    <script src="../libs/popper.min.js"></script>
    <script src="../libs/bootstrap.min.js"></script>
    <script src="../libs/jquery.mask.min.js"></script>
    <script src="../libs/toastr.min.js"></script>
    <script src="../libs/utils.js"></script>
    <script src="./javascript.js"></script>
    <script src="../../controller/controller-carencia.js"></script>
    <script src="../../controller/controller-doacao.js"></script>
</head>

<body>
    <header>
        <div class="topBackground">
            <div class="mainNav">
                <div class="esquerdaNav">
                    <img src="../icones/icone1-aparado.png" width="71" height="50">
                    <a class="navItens home" href="../../">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">home</i>
                            <div class="textNav">Início</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="divIcone">
                <div class="tituloTela">AGENDAR DOAÇÃO</div>
            </div>
        </div>
    </header>
    <h1 class="invalido">ID INVÁLIDO</h1>
    <main>
        <h3 class="desc">Descrição da carência:</h3>
        <div id="perg1" class="perg">Asilo: <div id="resp1" class="resp"></div></div>
        <div id="perg2" class="perg">Descrição: <div id="resp2" class="resp"></div></div>
        <div id="perg3" class="perg">Quantidade: <div id="resp3" class="resp"></div></div>
        <div id="perg3" class="perg">Tipo: <div id="resp4" class="resp"></div></div>
        <div class="parte voluntarios">
            <h5>Data e horário para prestar o serviço</h5>
            <input id="data" class="form-control inputs" type="text">
        </div>
        <div class="parte parceiro">
        <h5>Quantidade de insumos que você pode doar</h5>
            <input id="quantidade" class="form-control inputs" type="text" placeholder="Digite a quantidade">
        </div>
        <h6 class="alerta">* O asilo precisa aprovar a sua doação</h6>
        <button onclick="mandarDoacao()" type="button" class="btn btn-success enviar">Enviar</button>
    </main>
    <footer>
        <h6 class="copyright">Copyright © - ProAsilo</h6>
        <h6 class="contato">contato@proasilo.com.br</h6>
    </footer>
    <script>
        <?php
        $tipo = $ar[1];
        echo("var tipo = '$tipo';");
        ?>
        init()
    </script>
</body>

</html>