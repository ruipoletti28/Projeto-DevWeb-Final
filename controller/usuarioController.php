﻿<?php

require "util.php";
require "../model/UsuarioAdmin.php";

class UsuarioController
{
	
	function salvar()
	{
		if(isset($_POST['salvar']))
		{
			$nome = Util::clearparam($_POST['nome']);
			$email = Util::clearparam($_POST['email']);
			$senha = Util::clearparam($_POST['senha']);
			$tipo = Util::clearparam($_POST['tipo']);
			$id = Util::clearparam($_POST['id']);
			
			// se nao alterou a senha, nao salvar novamente pois está criptografada
			if(strlen($senha) == 32)
			{
			$senha = '';	
			}
			
			$usuario = new Usuario();
			$usuario->salvar($id,$nome, $email,$senha,$tipo);
			header("Location: usuario_list.php");
			exit();
		}
	}
	
	function excluir()
	{
		
		if(isset($_POST['excluir']))
		{
			$id = Util::clearparam($_POST['id']);
			
			$usuario = new Usuario();
			$usuario->excluir($id);
		
			header("Location: usuario_list.php");
			exit();
				
		}
	}

	function voltar()
	{
		
		if(isset($_POST['voltar']))
		{
			header("Location: login.php");
			exit();
				
		}
	}

	function cadastrar()
	{
		
		if(isset($_POST['cadastrar']))
		{
			header("Location: login.php");
			exit();
				
		}
	}
	
	function abrir()
	{
		
		if(isset($_GET['id']) && is_numeric($_GET['id']))
		{
			$usuario = new Usuario();
			return $usuario->abrir( $_GET['id']);
		}	
		
	}

	// listagem
	function listarcontroller()
	{
		
		$usuario = new Usuario();
		
		$linhas = $usuario->listar();
		
		$tabela = '';
		foreach($linhas as $linha)
		{
			$tabela .= '<tr>
							<td>'.$linha['id'].'</td>
							<td><a href="usuario_form.php?id='.$linha['id'].'">'.$linha['nome'].'</a></td>
							<td>'.$linha['email'].'</td>
						</tr>		
							';
			
		}
		
		return $tabela;
		
	}
	
	// função de autenticação de usuário
    function autenticarController()
    {
        if(isset($_POST['email']) && isset($_POST['senha']))
        {
			//MD5($_POST)
            $senha = ($_POST['senha']);
            $email = Util::clearparam($_POST['email']);
			//$tipo = ($_POST['tipo']);
            
            $usuario = new Usuario();
            
            $row = $usuario->autenticar($email, $senha);

            // encontrou usuário
            if(isset($row[0]['id']))
            {
                // Verifica o tipo de usuário
                if ($tipo == 'admin') {
					session_start();
                	$_SESSION['user_id'] = $row[0]['id'];
                    header("Location: indexAdmin.php"); // página do administrador
                } else {
					session_start();
                	$_SESSION['user_id'] = $row[0]['id'];
                    header("Location: index.php"); // página do usuário normal
                }
                exit();
            }
            else
            {
                return "E-mail ou senha inválidos";
            }
            
        }
        else
        {
            return ''; // nada a fazer
        }
    } 
}

?>