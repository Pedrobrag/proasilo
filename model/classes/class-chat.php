<?php
class Chat extends BancoDeDados {
    public function pegarMsg($idDesti, $tipoDesti) {
        $ar = $this->pegarSessao();
        $id = $ar[0];
        $tipo = $ar[1];
        $nome = $ar[2];
        if ($ar != null) {
            $sql = "SELECT id, msg, idRemetente, tipoRemetente, idDesti, tipoDesti, data from chat where
            (idRemetente = $id and tipoRemetente = '$tipo' and
            idDesti = $idDesti and tipoDesti = '$tipoDesti') or
            (idRemetente = $idDesti and tipoRemetente = '$tipoDesti' and
            idDesti = $id and tipoDesti = '$tipo')";
            if ($q = mysqli_query($this->conn, $sql)) {
                $arr = [];
                while ($row = mysqli_fetch_array($q)) {
                    $idMSG = $row['id'];
                    $idRemetenteQuery = $row['idRemetente'];
                    $tipoRemetenteQuery = $row['tipoRemetente'];
                    $idDestiQuery = $row['idDesti'];
                    $tipoDestiQuery = $row['tipoDesti'];
                    $msg = $row['msg'];
                    $data = $row['data'];

                    $u = new Usuario();
                    $nomeRemetente = $u->pegarUsuarioID($idRemetenteQuery, $tipoRemetenteQuery);
                    $nomeDesti = $u->pegarUsuarioID($idDestiQuery, $tipoDestiQuery);

                    $arr[$idMSG]['msg'] = $msg;
                    $arr[$idMSG]['remetente'] = $nomeRemetente;
                    $arr[$idMSG]['desti'] = $nomeDesti;
                    $arr[$idMSG]['data'] = $data;
                    if($idRemetenteQuery == $id && $tipoRemetenteQuery == $tipo) {
                        $arr[$idMSG]['sua'] = true;
                    }
                }
                return json_encode($arr);
            }
        }
    }

    public function enviarMsg($msg, $idDesti, $tipoDesti) {
        $ar = $this->pegarSessao();
        $idRemetente = $ar[0];
        $tipoRemetente = $ar[1];
        $dataAtual = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('d/m/Y H:i');
        if ($ar != null) {
            $sql = "INSERT INTO chat (msg, idRemetente, tipoRemetente, idDesti, tipoDesti, `data`)
            VALUES ('$msg', $idRemetente, '$tipoRemetente', '$idDesti', '$tipoDesti', '$dataAtual');";
            if (mysqli_query($this->conn, $sql)) {
                return 1;
            }

            return 0;
        }
    }
}
