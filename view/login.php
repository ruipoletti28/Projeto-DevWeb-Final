<?php

require_once "config.php";
require_once "../controller/usuarioController.php";

$usuarioController = new UsuarioController();

$errormsg = $usuarioController->autenticarController();
//$usuario = $usuarioController->cadastrar();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Reservas de Salas</title>

<style type="text/css">
body,td,th {
	font-family: "Open Sans", sans-serif;
}
</style>
</head>

<body>
<form action="login.php" method="post"  name="Formulario">

<div id="content">

<div id="esquerdo">
<img src="img/naturezaViva.jpg" width="478" height="320" />
    <div id="aviso">
    
</div>

</div>

<div id="direito">

<br />
<br />
<img src="img/logoViva.png" alt="Sistema de Aluguel de espaços" title="Sistema de Aluguel de espaços" width="220" height="72" />
<br />
<br />
<span style="color:#900"><?php echo $errormsg; ?></span><br />

<input type="text" name="email" id="email" placeholder="E-mail"  />
<br />
<br />

<input type="password" name="senha" id="senha" placeholder="Senha" />
<br />
<br />


<input type="submit" name="entrar" value="Entrar" class="btn1" />

<input class="btn1" type="button" name="cadastrar" value="Cadastrar-se" onclick="location.href='cadastrar.php';" />

</div>
</div>

<div id="rodape">

<a> Rui Carlos Poletti Junior <a>

</div>

</form>
</body>
</html>