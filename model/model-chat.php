<?php include 'autoloader.php';
$db = new BancoDeDados();
if (isset($_POST['pegarMSG']) && isset($_POST['id']) && isset($_POST['tipo'])) {
    $id = $db->proteger($_POST['id']);
    $tipo = $db->proteger($_POST['tipo']);
    $c = new Chat();
    echo($c->pegarMsg($id, $tipo));
}
if (isset($_POST['enviarMSG']) && isset($_POST['idDesti']) && isset($_POST['tipoDesti']) && isset($_POST['msg'])) {
    $idDesti = $db->proteger($_POST['idDesti']);
    $tipoDesti = $db->proteger($_POST['tipoDesti']);
    $msg = $db->proteger($_POST['msg']);
    $c = new Chat();
    echo($c->enviarMsg($msg, $idDesti, $tipoDesti));
}