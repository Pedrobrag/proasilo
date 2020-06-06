<?php


class Usuario extends BancoDeDados {

	function logar($str, $senha) {
        $senha_md5 = md5($senha);
        $queryString = "
        select id, nome, email, tipo from voluntarios 
        where (email='$str' or cpf='$str') and senha='$senha_md5'
        union
		select id, nome, email, tipo from instituicoes
		where (email='$str' or cnpj='$str') and senha='$senha_md5'
		union
		select id, nome, email, tipo from parceiros
		where (email='$str' or cnpj='$str') and senha='$senha_md5' limit 1
        ";
        $query = mysqli_query($this->conn, $queryString);
        if($this->mysqli_exist($query)) {
            $array = mysqli_fetch_assoc($query);
			$this->criarSessao($array['id'], $array['tipo'], $array['nome']);
			return json_encode($array);
		} else {
			return "{}";
		}
    }

    function pegarTodosDados() {
        $ar = $this->pegarSessao();
        $id = $ar[0];
        $tipo = $ar[1];
        if($tipo == "voluntario") {
            $queryString = "select a.nome, a.email, a.cpf, a.data_nascimento, 
            a.fk_id_endereco, b.estado, b.cidade, b.bairro, b.rua, b.numero, a.escolaridade, 
            a.instituicao_ensino, a.semestre, a.area_graduacao, a.objetivo, a.explicacao 
            from voluntarios as a left 
            join endereco as b on a.fk_id_endereco = b.id where a.id='$id'";
        }
        if($tipo == "instituicao") {
            $queryString = "select a.nome, a.email, a.cnpj, ano_fundacao, 
            a.fk_id_endereco, b.estado, b.cidade, b.bairro, b.rua,b.numero, a.numero_idosos, 
            a.numero_funcionarios, a.projetos_andamento, a.faixa_etaria, a.objetivo, a.descricao, a.agencia, a.cc
            from instituicoes as a left 
            join endereco as b on a.fk_id_endereco = b.id where a.id='$id'";
        }
        if($tipo == "parceiro") {
            $queryString = "select a.nome, a.email, a.cnpj, a.fk_id_endereco, 
            b.estado, b.cidade, b.bairro, b.rua,b.numero,
            a.numero_funcionarios, a.objetivo, a.descricao
            from parceiros as a left 
            join endereco as b on a.fk_id_endereco = b.id where a.id='$id'";
        }
        $resultadoQuery = $this->conn->query($queryString);
        $array = mysqli_fetch_assoc($resultadoQuery);
        return json_encode($array);
    }

    function pegarTodos() {
        $ar = $this->pegarSessao();
        $idUser = $ar[0]; 
        $tipoUser = $ar[1]; 
        $sql = "
        select id, nome, tipo from voluntarios 
        union
		select id, nome, tipo from instituicoes
		union
        select id, nome, tipo from parceiros";
        if ($q = mysqli_query($this->conn, $sql)) {
            $arr = [];
            while ($row = mysqli_fetch_array($q)) {
                $id = $row['id'];
                $nome = $row['nome'];
                $tipo = $row['tipo'];
                if($tipoUser == $tipo) {
                    if($idUser != $id) {
                        $arr[$nome]["id"] = $id;
                        $arr[$nome]["tipo"] = $tipo;
                    }
                } else {
                    $arr[$nome]["id"] = $id;
                    $arr[$nome]["tipo"] = $tipo;
                }
            }
            return json_encode($arr);
        }
    }

    public function pegarUsuarioID($id, $tipo) {
        $sql = "
        select id, nome, tipo from voluntarios where id=$id and tipo = '$tipo'
        union
		select id, nome, tipo from instituicoes where id=$id and tipo = '$tipo'
		union
        select id, nome, tipo from parceiros where id=$id and tipo = '$tipo'";
        //return $sql;
        $query = mysqli_query($this->conn, $sql);
        $array = mysqli_fetch_assoc($query);
        return $array["nome"];
    }


}


?>