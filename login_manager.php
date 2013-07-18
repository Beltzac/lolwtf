<?php

include 'session_start.php';
require_once 'DAO/PessoaDAO.php';
require_once 'DAO/PedidoDAO.php';


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
    exit();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$pdao = new PessoaDAO();
$pedidodao = new PedidoDAO();

$p = $pdao->selectByEmail($email,$senha);


    if ($p != null) {
        //inicializa dados da sessão
        $_SESSION['logado'] = TRUE;
        $_SESSION['id'] = $p->get('id');
        $_SESSION['nome'] = $p->get('nome');
        
        $carrinho = $pedidodao->selectAtual($_SESSION['id']);
        
        if ($carrinho != null) {
            $_SESSION['carrinho'] = $carrinho->get('cod_pedido');
        }
        if ($p->get('nivel_d_aces') > 0) {
            $_SESSION['admin'] = TRUE;
        } else {
            $_SESSION['admin'] = FALSE;
        }
        redirect();
    } else {

        // senha incorreta
        session_destroy();
        header('Location: novaconta.php');
    }

?>
