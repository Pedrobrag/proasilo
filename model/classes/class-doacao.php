<?php

class Doacao extends BancoDeDados {
    public function pegarTodasDoacoes() {
        $ar = $this->pegarSessao();
        if ($ar != null) {
            $id = $ar[0];
            $sql = "SELECT a.id, a.idUsuario, a.tipoUsuario, c.nome as nomeParceiro, d.nome as nomeVoluntario, 
            a.data, b.`desc`, a.quantidade, a.estado from doacoes as a left join carencias as b
            on b.id = a.idCarencia
            left join parceiros as c on c.id = a.idUsuario and c.tipo = a.tipoUsuario
            left join voluntarios as d on d.id = a.idUsuario and d.tipo = a.tipoUsuario where b.asilo = $id";
            if ($q = mysqli_query($this->conn, $sql)) {
                $arr = [];
                while ($row = mysqli_fetch_array($q)) {
                    $id = $row['id'];
                    $idUsuario = $row['idUsuario'];
                    $tipoUsuario = $row['tipoUsuario'];
                    $nomeParceiro = $row['nomeParceiro'];
                    $nomeVoluntario = $row['nomeVoluntario'];
                    $desc = $row['desc'];
                    $data = $row['data'];
                    $quantidade = $row['quantidade'];
                    $estado = $row['estado'];
                    $arr[$id]['idUsuario'] = $idUsuario;
                    $arr[$id]['tipoUsuario'] = $tipoUsuario;
                    $arr[$id]['data'] = $data;
                    $arr[$id]['desc'] = $desc;
                    $arr[$id]['quantidade'] = $quantidade;
                    $arr[$id]['estado'] = $estado;
                    if ($tipoUsuario == 'parceiro') {
                        $arr[$id]['nome'] = $nomeParceiro;
                    }
                    if ($tipoUsuario == 'voluntario') {
                        $arr[$id]['nome'] = $nomeVoluntario;
                    }
                }
                return json_encode($arr);
            }
        }
    }

    public function pegarMinhasDoacoes() {
        $ar = $this->pegarSessao();
        if ($ar != null) {
            $id = $ar[0];
            $tipo = $ar[1];
            $sql = "SELECT a.id, a.idUsuario, a.tipoUsuario, c.nome as nomeParceiro, d.nome as nomeVoluntario, 
            a.data, b.`desc`, a.quantidade, a.estado from doacoes as a left join carencias as b
            on b.id = a.idCarencia
            left join parceiros as c on c.id = a.idUsuario and c.tipo = a.tipoUsuario
            left join voluntarios as d on d.id = a.idUsuario and d.tipo = a.tipoUsuario where a.idUsuario = $id 
            and a.tipoUsuario = '$tipo'";
            if ($q = mysqli_query($this->conn, $sql)) {
                $arr = [];
                while ($row = mysqli_fetch_array($q)) {
                    $id = $row['id'];
                    $idUsuario = $row['idUsuario'];
                    $tipoUsuario = $row['tipoUsuario'];
                    $nomeParceiro = $row['nomeParceiro'];
                    $nomeVoluntario = $row['nomeVoluntario'];
                    $desc = $row['desc'];
                    $data = $row['data'];
                    $quantidade = $row['quantidade'];
                    $estado = $row['estado'];
                    $arr[$id]['idUsuario'] = $idUsuario;
                    $arr[$id]['tipoUsuario'] = $tipoUsuario;
                    $arr[$id]['data'] = $data;
                    $arr[$id]['desc'] = $desc;
                    $arr[$id]['quantidade'] = $quantidade;
                    $arr[$id]['estado'] = $estado;
                    if ($tipoUsuario == 'parceiro') {
                        $arr[$id]['nome'] = $nomeParceiro;
                    }
                    if ($tipoUsuario == 'voluntario') {
                        $arr[$id]['nome'] = $nomeVoluntario;
                    }
                }
                return json_encode($arr);
            }
        }
    }

    public function agendarDoacao($idCarencia, $data, $qnt) {
        $ar = $this->pegarSessao();
        if ($ar != null) {
            $id = $ar[0];
            $tipo = $ar[1];
            if ($tipo == 'parceiro') {
                $sql = "INSERT INTO doacoes (idCarencia, idUsuario, tipoUsuario, quantidade)
                VALUES ($idCarencia, $id, '$tipo', '$qnt')";
            }
            if ($tipo == 'voluntario') {
                $sql = "INSERT INTO doacoes (idCarencia, idUsuario, tipoUsuario, `data`)
                VALUES ($idCarencia, $id, '$tipo', '$data')";
            }
            $c = new Carencia();
            $c->mudarEstado($idCarencia, 1);
            if (mysqli_query($this->conn, $sql)) {
                return 1;
            }

            return mysqli_error($this->conn);
        }
    }

    function aceitar($id) {
        $queryString = "UPDATE carencias AS dest, (SELECT * FROM `doacoes` WHERE `id` = $id) AS src
        SET dest.estado = 2
        WHERE dest.id = src.idCarencia;
        UPDATE doacoes set estado = 2 where id=$id";
        if (mysqli_multi_query($this->conn, $queryString)) {
            return 1;
        } else {
            return 0;
        }
    }

    function recusar($id) {
        $queryString = "UPDATE doacoes set estado = 0 where id=$id";
        if (mysqli_multi_query($this->conn, $queryString)) {
            return 1;
        } else {
            return 0;
        }
    }
}
