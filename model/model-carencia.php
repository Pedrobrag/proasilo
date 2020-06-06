<?php include 'autoloader.php';

$db = new BancoDeDados();

if (isset($_POST['pegarCarencia']) && isset($_POST['id'])) {
    $id = $db->proteger($_POST['id']);
    $c = new Carencia();
    if(isset($_POST['valida'])) {
        echo $c->pegarCarencia($id, true);
    } else {
        echo $c->pegarCarencia($id);
    }
}

if (isset($_POST['pegarMinhasCarencias'])) {
    $c = new Carencia();
    echo $c->pegarMinhasCarencias();
}

if (isset($_POST['pegarTodasCarencias']) && isset($_POST['id'])) {
    $id = $db->proteger($_POST['id']);
    $c = new Carencia();
    if(isset($_POST['valida'])) {
        echo $c->pegarTodasCarencias($id, true);
    } else {
        echo $c->pegarTodasCarencias($id);
    }
}

if (isset($_POST['adicionar']) && isset($_POST['texto']) && isset($_POST['tipo']) && isset($_POST['qnt'])) {
    $texto = $db->proteger($_POST['texto']);
    $qnt = $db->proteger($_POST['qnt']);
    $tipo = $db->proteger($_POST['tipo']);
    if(strlen($texto) <= 500 && strlen($qnt) <= 500) {
        $c = new Carencia();
        echo $c->adicionarCarencia($texto, $qnt, $tipo);
    } else {
        echo "String muito grande";
    }
}

if (isset($_POST['editar']) && isset($_POST['id']) && isset($_POST['texto']) && isset($_POST['tipo']) && isset($_POST['qnt'])) {
    $id = $db->proteger($_POST['id']);
    $texto = $db->proteger($_POST['texto']);
    $qnt = $db->proteger($_POST['qnt']);
    $tipo = $db->proteger($_POST['tipo']);
    $c = new Carencia();
    echo $c->mudarCarencia($id, $texto, $qnt, $tipo);
}

if (isset($_POST['excluir']) && isset($_POST['id'])) {
    $id = $db->proteger($_POST['id']);
    $c = new Carencia();
    echo $c->excluirCarencia($id);
}