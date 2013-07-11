<?php

include '../session_start.php';
require_once 'PedidoDAO.php';
require_once 'ProdutoDAO.php';
require_once 'ContemDAO.php';
require_once 'PessoaDAO.php';
require_once 'carrinhoDAO.php';

//Não deixa acessar a pagina se não estiver logado
if (!$_SESSION['logado']) {
    header('Location: ../index.php');
}

//Redireciona para a pagina anterior, atualiza o valor e quantidade de produtos no carrinho
function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ../index.php');
    }
    
    
    $caDAO = new carrinhoDAO();
    $total =  $caDAO->total($_SESSION['carrinho']);  
    $_SESSION['valorTotal'] = $total[0];  
    $_SESSION['quantidadeProdutos'] = $total[1];  
    
}

if (!isset($_GET['tipo'])) {
    redirect();
}



$pdao = new ProdutoDAO();
$cdao = new contemDAO();
$peddao = new PedidoDAO();
$pedido = $peddao->selectAtual($_SESSION['id']);


switch ($_GET['tipo']) {
    
    //Inicializa o carrinho se ele não existir
    case 'iniciar':
        
        $_SESSION['carrinho'] = $pdao->selectAtual($_SESSION['id']);
        
        if(!$_SESSION['carrinho']){
        $pesdao = new PessoaDAO();
        $pedido = new Pedido();
        $pessoa = new Pessoa();
        $pessoa = $pesdao->selectByCod($_SESSION['id']);

        $pedido->set('situacao', 'carrinho');
        $pedido->set('id_p', $_SESSION['id']);
        $pedido->set('cod_end', $pessoa->get('cod_end'));

        $pdao->insert($pedido);
        $_SESSION['carrinho'] = $pdao->selectAtual($_SESSION['id']);
        }
      

      
        
        break;
        
    //adiciona um produto no carrinho do usuário
    case 'adicionarProduto':

        $c = new contem();

        $c->set('cod_prod', $_GET['cod_prod']);
        $c->set('cod_ped', $pedido->get('cod_pedido'));

        $c->set('quantidade', 1);

        $produto = $pdao->selectByCod($_GET['cod_prod']);

        $c->set('preco', $produto->get('preco'));

        $cdao->insert($c);

       
        break;
    //Remove um produto do carrinho
    case 'removerProduto':

        $cdao->Delete($_GET['cod_prod'], $pedido->get('cod_pedido'));
        

        break;
    //Atualiza a quantidade do produto no carrinho 
    case 'atualizarQuantidade':

        $c = new contem();

        $c->set('cod_prod', $_GET['cod_prod']);
        $c->set('cod_ped', $pedido->get('cod_pedido'));

        $c->set('quantidade', $_GET['quantidade']);

        $produto = $pdao->selectByCod($_GET['cod_prod']);

        $c->set('preco', $produto->get('preco'));

        $cdao->Update($c);

        
        break;

    //Finaliza o carrinho
    case 'finalizar':

        redirect();
        break;
    
    default:
        break;
}
redirect();
?>
