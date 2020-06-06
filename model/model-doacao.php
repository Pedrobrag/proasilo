<?php include 'autoloader.php';
$db = new BancoDeDados();

if (isset($_POST['enviarDoacao']) && isset($_POST['carencia']) 
&& isset($_POST['data']) && isset($_POST['quantidade'])) {
    $carencia = $db->proteger($_POST['carencia']);
    $data = $db->proteger($_POST['data']);
    $quantidade = $db->proteger($_POST['quantidade']);
    $d = new Doacao();
    echo($d->agendarDoacao($carencia, $data, $quantidade));
}
if (isset($_POST['pegarTodasDoacoesRecebidas'])) {
    $d = new Doacao();
    echo($d->pegarTodasDoacoes());
}
if (isset($_POST['pegarMinhasDoacoes'])) {
    $d = new Doacao();
    echo($d->pegarMinhasDoacoes());
}
if (isset($_POST['aceitar'])) {
    $id = $db->proteger($_POST['aceitar']);
    $d = new Doacao();
    echo($d->aceitar($id));
}
if (isset($_POST['recusar'])) {
    $id = $db->proteger($_POST['recusar']);
    $d = new Doacao();
    echo($d->recusar($id));
}
