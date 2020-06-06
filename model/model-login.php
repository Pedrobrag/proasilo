<?php
include 'autoloader.php';
    $usuario = new Usuario();
    if (isset($_POST['finalizar'])) {
        $usuario->finalizarSessao();
    } else {
        $str = $usuario->proteger($_POST['email']);
        $senha = $usuario->proteger($_POST['senha']);
        echo $usuario->logar($str, $senha);
    };
