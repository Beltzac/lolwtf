<?php

include '../session_start.php';
if (!$_SESSION['logado']) {
    header('Location: ../index.php');
}

require_once 'PedidoDAO.php';

function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ../index.php');
    }
}

if (!isset($_POST['tipo'])) {
    redirect();
}



$pdao = new ProdutoDAO();
$cdao = new contemDAO();

switch ($_POST['tipo']) {
    case 'adicionarProduto':

        $c = new contem();

        $c->set('cod_prod', $_POST['cod_prod']);
        $c->set('cod_ped', $_POST['cod_ped']);

        $c->set('quantidade', $_POST['quantidade']);

        $produto = $pdao->selectByCod($_POST['cod_prod']);

        $c->set('preco', $produto->get('preco'));

        $cdao->insert($c);

 redirect();
        break;

    case 'removerProduto':

        $cdao->Delete($_POST['cod_prod'], $_POST['cod_ped']);
        
 redirect();
        break;

    case 'atualizaQuantidade':

        $c = new contem();

        $c->set('cod_prod', $_POST['cod_prod']);
        $c->set('cod_ped', $_POST['cod_ped']);

        $c->set('quantidade', $_POST['quantidade']);

        $produto = $pdao->selectByCod($_POST['cod_prod']);

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
