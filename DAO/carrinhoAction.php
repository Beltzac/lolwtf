<?php

include '../session_start.php';
if (!$_SESSION['logado']) {
    header('Location: ../index.php');
}



function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ../index.php');
    }
}

if (!isset($_GET['tipo'])) {
    redirect();
}

require_once 'PedidoDAO.php';
require_once 'ProdutoDAO.php';
require_once 'ContemDAO.php';

$pdao = new ProdutoDAO();
$cdao = new contemDAO();
$peddao = new PedidoDAO();
$pedido = $peddao->selectAtual($_SESSION['id']);


switch ($_GET['tipo']) {
    case 'adicionarProduto':

        $c = new contem();

        $c->set('cod_prod', $_GET['cod_prod']);
        $c->set('cod_ped', $pedido->get('cod_pedido'));

        $c->set('quantidade', 1);

        $produto = $pdao->selectByCod($_GET['cod_prod']);

        $c->set('preco', $produto->get('preco'));

        $cdao->insert($c);

        redirect();
        break;

    case 'removerProduto':

        $cdao->Delete($_GET['cod_prod'], $pedido->get('cod_pedido'));
        redirect();
         
        break;

    case 'atualizarQuantidade':

        $c = new contem();

        $c->set('cod_prod', $_GET['cod_prod']);
        $c->set('cod_ped', $pedido->get('cod_pedido'));

        $c->set('quantidade', $_GET['quantidade']);

        $produto = $pdao->selectByCod($_GET['cod_prod']);

        $c->set('preco', $produto->get('preco'));

        $cdao->Update($c);
        
        redirect();
        break;

    case 'finalizar':

 redirect();
        break;

    default:
        break;
}
?>
