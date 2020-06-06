<?php

class Voluntario extends Usuario {
    
    function criar($nome, $email, $senha, $cpf, $nascimento, $instituicaoEnsino, 
    $escolaridade, $semestre, $graduacao, $objetivo, $motivos, $fk_id_endereco, $id=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        if($senha != null) {
            $this->senha = md5($senha);
        } else {
            $this->senha = null;
        }
		$this->cpf = $cpf;
		$this->nascimento = $nascimento;
		$this->instituicaoEnsino = $instituicaoEnsino;
		$this->escolaridade = $escolaridade;
		$this->semestre = $semestre;
		$this->graduacao = $graduacao;
		$this->objetivo = $objetivo;
		$this->motivos = $motivos;
        $this->fk_id_endereco = $fk_id_endereco;
    }

	function enviar() {
		$queryString = "INSERT INTO voluntarios(nome, email, senha, cpf, data_nascimento, fk_id_endereco, escolaridade, 
        instituicao_ensino, semestre, area_graduacao, objetivo, explicacao)
		VALUES('$this->nome', '$this->email', '$this->senha', '$this->cpf', '$this->nascimento', 
        '$this->fk_id_endereco', '$this->escolaridade', '$this->instituicaoEnsino', '$this->semestre', '$this->graduacao', 
		'$this->objetivo', '$this->motivos')";
		if(mysqli_query($this->conn, $queryString)){
			return 1;
		} else{
			return mysqli_error($this->conn);
		}
    }
    
    function atualizar() {
        if($this->senha != null) {
            $pass = ", senha='$this->senha'";
        } else {
            $pass = '';
        }
        $queryString = "UPDATE voluntarios set nome='$this->nome', email='$this->email', 
        cpf='$this->cpf', data_nascimento='$this->nascimento', escolaridade='$this->escolaridade', 
        instituicao_ensino='$this->instituicaoEnsino', semestre='$this->semestre', 
        area_graduacao='$this->graduacao', objetivo='$this->objetivo', 
        explicacao='$this->motivos' $pass where id='$this->id'";
		if(mysqli_query($this->conn, $queryString)){
			return 1;
		} else{
			return mysqli_error($this->conn);
		}
    }

    function listaVoluntarios() {
        $sql = "SELECT id, nome, area_graduacao from voluntarios";
        if ($q = mysqli_query($this->conn, $sql)) {
            $arr = [];
            while ($row = mysqli_fetch_array($q)) {
                $id = $row['id'];
                $nome = $row['nome'];
                $gra = $row['area_graduacao'];
                $arr[$id]["nome"] = $nome;
                $arr[$id]["graduacao"] = $gra;
            }
            return json_encode($arr);
        }
    }

}

?>