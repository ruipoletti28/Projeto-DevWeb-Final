<?php
class Logoff {
  
  public function fazerLogoff() {
    // Inicia a sessão
    session_start();
    
    // Remove todas as variáveis de sessão
    $_SESSION = array();
    
    // Destroi a sessão
    session_destroy();
    
    // Redireciona para a página de login
    header("Location: login.php");
    exit();
  }
}

// Exemplo de uso
$logoff = new Logoff();
$logoff->fazerLogoff();
?>
