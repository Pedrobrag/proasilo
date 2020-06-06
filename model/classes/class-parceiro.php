<?php

class Parceiro extends Usuario {

    function criar($nome, $email, $senha, $cnpj, $numero_funcionarios, 
    $objetivo, $descricao, $fk_id_endereco, $id = null){
        $this->id = $id;
        $this->nome = $nome;
		$this->email = $email;
		if($senha != null) {
            $this->senha = md5($senha);
        } else {
            $this->senha = null;
        }
		$this->numero_funcionarios = $numero_funcionarios;
		$this->cnpj = $cnpj;
		$this->objetivo = $objetivo;
		$this->descricao = $descricao;
		$this->fk_id_endereco = $fk_id_endereco;
    }
    
	function enviar(){
		$queryString = "
		INSERT INTO PARCEIROS(nome, email, senha, cnpj, numero_funcionarios, objetivo, descricao, fk_id_endereco) 
        VALUES ('$this->nome', '$this->email', '$this->senha', '$this->cnpj', 
        '$this->numero_funcionarios', '$this->objetivo', '$this->descricao', 
        '$this->fk_id_endereco');";
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
        $queryString = "UPDATE parceiros set nome='$this->nome', email='$this->email', 
        cnpj='$this->cnpj', numero_funcionarios='$this->numero_funcionarios', 
        objetivo='$this->objetivo', descricao='$this->descricao' $pass where id='$this->id'";
		if(mysqli_query($this->conn, $queryString)){
			return 1;
		} else{
			return mysqli_error($this->conn);
		}
    }

    function listaParceiros() {
        $sql = "SELECT id, nome from parceiros";
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