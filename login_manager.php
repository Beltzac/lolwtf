<?php

include 'session_start.php';
require_once 'DAO/PessoaDAO.php';

function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }
}

if (!isset($_POST['email']) || !isset($_POST['senha'])) {

    session_destroy();

    redirect();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$pdao = new PessoaDAO();

$res =  $pdao->selectByEmail($email);

if(isset($res[0])){
$p = $res[0];


$senhadb =$p->get('senha');

var_dump($res);

if ($senha == $senhadb) {
    $_SESSION['logado'] = TRUE;
     $_SESSION['id'] = $p->get('id');
      $_SESSION['nome'] = $p->get('nome');
      $carrinho = $pdao->selectAtual($_SESSION['id']);
      if($carrinho){
      $_SESSION['carrinho'] = $carrinho->get('cod_pedido');
      }
    if($p->get('nivel_d_aces') > 0){
      $_SESSION['admin'] = TRUE;
    }
    else{
      $_SESSION['admin'] = FALSE;
    }
        redirect();
} else {

    // senha incorreta
   session_destroy();
   redirect();
}

}else{
    //email não existe
   session_destroy();
   redirect();
}
?>
