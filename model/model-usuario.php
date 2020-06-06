<?php include 'autoloader.php';
if (isset($_GET['pegarTodosDados'])) {
    $usuario = new Usuario();
    echo $usuario->pegarTodosDados();
}
if (isset($_GET['voluntarios'])) {
    $v = new Voluntario();
    echo $v->listaVoluntarios();
}
if (isset($_GET['parceiro'])) {
    $p = new Parceiro();
    echo $p->listaParceiros();
}
if (isset($_GET['asilos'])) {
    $a = new Instituicao();
    echo $a->listaInstituicao();
}
if (isset($_GET['pegarTodasInstituicoes'])) {
    $a = new Instituicao();
    echo $a->pegarTodasInstituicoes();
}
if (isset($_GET['todos'])) {
    $u = new Usuario();
    echo $u->pegarTodos();
}