<?php

class Carencia extends BancoDeDados {

    public function pegarCarencia($id, $valida = false) {
        if(!$valida) {
            $queryString = "SELECT a.id, b.nome, a.desc, a.qnt, a.tipo, a.estado
            from carencias as a left 
            join instituicoes as b on a.asilo = b.id where a.id = $id limit 1";
        } else {
            $queryString = "SELECT a.id, b.nome, a.desc, a.qnt, a.tipo, a.estado
            from carencias as a left 
            join instituicoes as b on a.asilo = b.id where a.id = $id and a.estado = 0 limit 1";
        }
        if ($q = mysqli_query($this->conn, $queryString)) {
            $array = mysqli_fetch_assoc($q);
            return json_encode($array);
        }
    }
    
    public function pegarMinhasCarencias() {
        $id = $this->pegarSessao()[0];
        $t = $this->pegarSessao()[1];
        if ($t == 'instituicao') {
            $queryString = "select a.id, b.nome, a.desc, a.qnt, a.tipo, a.estado
            from carencias as a left 
            join instituicoes as b on a.asilo = b.id where a.asilo = $id";
            if ($q = mysqli_query($this->conn, $queryString)) {
                $arr = [];
                while ($row = mysqli_fetch_array($q)) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $desc = $row['desc'];
                    $qnt = $row['qnt'];
                    $tipo = $row['tipo'];
                    $estado = $row['estado'];
                    $arr[$id]["nome"] = $nome;
                    $arr[$id]["desc"] = $desc;
                    $arr[$id]["qnt"] = $qnt;
                    $arr[$id]["tipo"] = $tipo;
                    $arr[$id]["estado"] = $estado;
                }
                return json_encode($arr);
            }
            return mysqli_error($this->conn);
        } else {
            return "null";
        }
    }

    public function pegarTodasCarencias($asilo, $valida = false) {
        $t = $this->pegarSessao()[1];
        if ($t != 'instituicao') {
            if(!$valida) {
                $queryString = "select a.id, b.nome, a.desc, a.qnt, a.tipo, a.estado
                from carencias as a left 
                join instituicoes as b on a.asilo = b.id where a.asilo = $asilo";
            } else {
                $queryString = "select a.id, b.nome, a.desc, a.qnt, a.tipo, a.estado
                from carencias as a left 
                join instituicoes as b on a.asilo = b.id where a.asilo = $asilo and a.estado = 0";
            }
            if ($q = mysqli_query($this->conn, $queryString)) {
                $arr = [];
                while ($row = mysqli_fetch_array($q)) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $desc = $row['desc'];
                    $qnt = $row['qnt'];
                    $tipo = $row['tipo'];
                    $estado = $row['estado'];
                    $arr[$id]["nome"] = $nome;
                    $arr[$id]["desc"] = $desc;
                    $arr[$id]["qnt"] = $qnt;
                    $arr[$id]["tipo"] = $tipo;
                    $arr[$id]["estado"] = $estado;
                }
                return json_encode($arr);
            }
            return mysqli_error($this->conn);
        } else {
            return "null";
        }
    }

    public function adicionarCarencia($nome, $qnt, $tipo) {
        $id = $this->pegarSessao()[0];
        $t = $this->pegarSessao()[1];
        if ($t == 'instituicao') {
            if($qnt != null) {
                $queryString = "INSERT INTO carencias (asilo, `desc`, qnt, tipo) VALUES ($id, '$nome', '$qnt', $tipo)";
            } else {
                $queryString = "INSERT INTO carencias (asilo, `desc`, tipo) VALUES ($id, '$nome', $tipo)";
            }
            if (mysqli_query($this->conn, $queryString)) {
                return 1;
            }
            return mysqli_error($this->conn);
        } else {
            return "null";
        }
    }

    public function mudarCarencia($id, $texto, $qnt, $tipo) {
        $t = $this->pegarSessao()[1];
        if ($t == 'instituicao') {
            if($qnt != null && $tipo == 0) {
                $queryString = "UPDATE carencias SET `desc` = '$texto', qnt = '$qnt', tipo = '$tipo' WHERE id='$id';";
            } else {
                $queryString = "UPDATE carencias SET `desc` = '$texto', qnt = null, tipo = '$tipo' WHERE id='$id';";
            }
            if (mysqli_query($this->conn, $queryString)) {
                return 1;
            }
            return mysqli_error($this->conn);
        } else {
            return "null";
        }
    }

    public function mudarEstado($id, $estado) {
        $sql = "UPDATE carencias SET estado = $estado WHERE id=$id";
        if (mysqli_query($this->conn, $sql)) {
            return 1;
        }
    }

    public function excluirCarencia($id) {
        $t = $this->pegarSessao()[1];
        if ($t == 'instituicao') {
            $queryString = "
            DELETE FROM carencias where id='$id'; 
            DELETE FROM doacoes where idCarencia='$id';
            ";
            if (mysqli_multi_query($this->conn, $queryString)) {
                return 1;
            }
            return mysqli_error($this->conn);
        } else {
            return "null";
        }
    }
}
