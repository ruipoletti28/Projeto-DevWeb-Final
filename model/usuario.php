<?php
require_once "db_mysqli.php";

class Usuario
{
 
	function autenticar($email, $senha, $tipo){
		
		$db = new Database();
		
		$sql = 'SELECT id from usuario WHERE email= "'.$email.'" AND senha="'.$senha.'" AND tipo="'.$tipo.'";' ;
		return $db->query($sql);
		
	}

	function listar()
	{
		
		$db = new Database();
		
		$sql = ' select * from usuario order by nome;' ;
		return $db->query($sql);
	}
	
	
	function abrir($id)
	{
		
		$db = new Database();
		
		$sql = ' select * from usuario where id = '. $id; ;
		return $db->query($sql);
	}
	
	function salvar($id,$nome, $email,$senha, $tipo)
	{
	
		$db = new Database();
		
		// inserir
		if($id == 0)
		{
			$senha = md5($senha);
			
			$sql = 'insert into usuario ( nome, email, senha, tipo) values ("'.$nome.'","'.$email.'","'.$senha .'","'.$tipo.'")';
			return $db->query_insert($sql);
		}
		else
		{ // atualizar
			
			if($email != '')
			$and = ' ,senha = md5(\''.$senha.'\')  ';
			else
			$and = '';
			
			$sql = ' update usuario set nome = "'.$nome.'", email = "'.$email.'" '. $and . ' where id = ' .$id;
			return $db->query_update($sql);

		}

		
	}
	
	function excluir($id)
	{
		$db = new Database();
		$sql = 'delete from usuario where id = '.$id; 
		return $db->query_update($sql);
	}
	
}

?>