<?php
session_start();
require_once 'PedidoDAO.php';

function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }
}

$peddao= new PedidoDAO();
$p = new Pedido();

$p->set('cod_pedido', $_SESSION['carrinho']);
$p->set('id_p', $_SESSION['id']);
$p->set('cod_end',$_SESSION['cod_end']);
$p->set('situacao','a enviar');
$p->set('forma_d_entreg', $_POST['envio']);
$p->set('forma_d_pag', $_POST['pagamento']);

$err = $peddao->Update($p);
echo $err;
$_SESSION['carrinho']=NULL;
header('Location: ../statusPedido.php');




?>
