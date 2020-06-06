<?php

class Endereco extends BancoDeDados {
	
	function criar($estado, $cidade, $bairro, $rua, $numero) {
        $str = "INSERT INTO endereco(bairro, estado, cidade, rua, numero) 
        VALUES('$bairro', '$estado', '$cidade', '$rua', '$numero')";
		if(mysqli_query($this->conn, $str)) {
			return mysqli_insert_id($this->conn);
        }
		return 0;
    }
    
    function atualizar($id, $estado, $cidade, $bairro, $rua, $numero) {
        $str = "UPDATE endereco set bairro='$bairro', 
        estado='$estado', cidade='$cidade', rua='$rua', numero='$numero' where id=$id";
        if(mysqli_query($this->conn, $str)) {
			return 1;
        }
		return 0;
    }

	function excluir($id){
		mysqli_query($this->conn, "DELETE FROM endereco WHERE id = '$id';");
	}

}

?>