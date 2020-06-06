<?php include 'autoloader.php';
$db = new BancoDeDados();
if (isset($_POST['pegarTodosDadosUsuarios'])) {
    $tipo = $db->proteger($_POST['pegarTodosDadosUsuarios']);
    $queryString = 'SELECT nome from ' . $tipo;
    $query = mysqli_query($db->conn, $queryString);
    $arr = [];
    while ($linha = mysqli_fetch_array($query)) {
        $nome = $linha['nome'];
        array_push($arr, $nome);
    }
    echo json_encode($arr);
}
