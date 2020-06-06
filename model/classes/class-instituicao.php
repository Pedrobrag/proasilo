<?php

class Instituicao extends Usuario {

    function pegarTodasInstituicoes() {
        $queryString = "SELECT a.id, a.nome, a.agencia, a.cc, count(b.id) as num
        from instituicoes as a left join carencias as b on a.id = b.asilo
        GROUP BY a.nome";
        if ($q = mysqli_query($this->conn, $queryString)) {
            $arr = [];
            while ($row = mysqli_fetch_array($q)) {
                $id = $row['id'];
                $nome = $row['nome'];
                $agencia = $row['agencia'];
                $cc = $row['cc'];
                $arr[$id]["nome"] = $nome;
                $arr[$id]["agencia"] = $agencia;
                $arr[$id]["cc"] = $cc;
            }
            return json_encode($arr);
        }
    }

    function criar($nome, $email, $senha, $cnpj, $ano_fundacao, $numero_idosos, $faixa_etaria, $numero_funcionarios, 
    $projetos_andamento, $objetivo, $descricao, $fk_id_endereco, $id = null, $agencia, $cc) {
        $this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		if($senha != null) {
            $this->senha = md5($senha);
        } else {
            $this->senha = null;
        }
		$this->cnpj = $cnpj;
		$this->ano_fundacao = $ano_fundacao;
		$this->numero_idosos = $numero_idosos;
		$this->faixa_etaria = $faixa_etaria;
		$this->numero_funcionarios = $numero_funcionarios;
		$this->projetos_andamento = $projetos_andamento;
		$this->objetivo = $objetivo;
		$this->descricao = $descricao;
        $this->fk_id_endereco = $fk_id_endereco;
        $this->agencia = $agencia;
        $this->cc = $cc;
    }
    
	function enviar() {
		$queryString = "
        INSERT INTO instituicoes(nome, email, senha, cnpj, ano_fundacao, numero_idosos, faixa_etaria, 
        numero_funcionarios, projetos_andamento, objetivo, descricao, fk_id_endereco, agencia, cc) 
        VALUES ('$this->nome', '$this->email', '$this->senha', '$this->cnpj', '$this->ano_fundacao', '$this->numero_idosos', 
        '$this->faixa_etaria', '$this->numero_funcionarios', '$this->projetos_andamento', '$this->objetivo', 
        '$this->descricao', '$this->fk_id_endereco', '$this->agencia', '$this->cc')";
        if(mysqli_query($this->conn, $queryString)) {
			return 1;
		} else {
			return mysqli_error($this->conn);
		}
    }
    
    function atualizar() {
        if($this->senha != null) {
            $pass = ", senha='$this->senha'";
        } else {
            $pass = '';
        }
        $queryString = "UPDATE instituicoes set nome='$this->nome', email='$this->email', 
        cnpj='$this->cnpj', ano_fundacao='$this->ano_fundacao', numero_idosos='$this->faixa_etaria', 
        numero_idosos='$this->numero_idosos', numero_funcionarios='$this->numero_funcionarios', projetos_andamento='$this->projetos_andamento', 
        objetivo='$this->objetivo', descricao='$this->descricao', agencia='$this->agencia',
        cc='$this->cc' $pass where id='$this->id'";
        if(mysqli_query($this->conn, $queryString)){
			return 1;
		} else{
			return mysqli_error($this->conn);
		}
    }

    function listaInstituicao() {
        $sql = "SELECT id, nome from instituicoes";
        if ($q = mysqli_query($this->conn, $sql)) {
            $arr = [];
            while ($row = mysqli_fetch_array($q)) {
                $id = $row['id'];
                $nome = $row['nome'];
                $arr[$id]["nome"] = $nome;
            }
            return json_encode($arr);
        }
    }
}

?>