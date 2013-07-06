<?php
    include 'session_start.php';    
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Carrinho - Lolwtf Mobile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/boxOver.js"></script>
        <script src="js/jquery-2.0.2.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="jquery-ui.min.css" />
    </head>
    <body>

        <div id="main_container">

            <?php
            include ('funcoes.php');
            include ('header.php');
            ?>

            <div id="main_content">

                <?php
                include ('menu.php');
                include ('menuEsquerda.php');
                ?>

                <div class="center_content">

                    <div class="center_title_bar">
                        Meu carrinho
                    </div>

                    
                    <?php
                    
                    require_once 'DAO/ProdutoDAO.php';
                    require_once 'DAO/PedidoDAO.php';
                    require_once 'DAO/contemDAO.php';
                    require_once 'DAO/PessoaDAO.php';
                    
                    $pdao = new PedidoDAO();
                    $cdao = new contemDAO();
                    $proddao = new ProdutoDAO();              
                    $pesdao = new PessoaDAO();
                    
                    
                    
                    $carrinho = $pdao->selectAtual($_SESSION['id']);
                    if(!$carrinho){
                        
                        $pedido = new Pedido();
                        $pessoa = new Pessoa();
                        $pessoa = $pesdao->selectByCod($_SESSION['id']);
                        
                        $pedido->set('situacao', 'carrinho');
                        $pedido->set('id_p', $_SESSION['id']);
                        $pedido->set('cod_end', $pessoa->get('cod_end'));
                        
                        $pdao->insert($pedido);
                        
                        $carrinho = $pdao->selectAtual($_SESSION['id']);
                    }
                    
                    $contem = $cdao->selectAllByCod($carrinho->get('cod_pedido'));
                    
                    $produtos = array();
                    
                                       
                     foreach ($contem as $value){                    
                         $produtos[] = $proddao->selectByCod($value->get('cod_prod'));
                     }        
                     
                      

                    foreach ($produtos as $value)
                        carrinhoProduto($value);                    
                    ?>



                    <div class="form_row">
                        <a href="formapag.php" class="prod_buy">Finalizar</a>
                    </div>
                </div><!-- center -->

<?php
include ('menuDireita.php');
?>
            </div><!-- main index -->

<?php
include ('footer.html');
?>
        </div>
    </body>
</html>