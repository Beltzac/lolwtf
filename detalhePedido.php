<?php
    include 'session_start.php';    
    if (!$_SESSION['logado']) {
    header('Location: index.php');
    exit();
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pedido <?php echo $_GET['cod'] ?> - Lolwtf Mobile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/boxOver.js"></script>
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
                        Pedido <?php echo $_GET['cod'] ?>
                    </div>

                    
                    <?php
                    
                    require_once 'DAO/carrinhoDAO.php';                    
             
                                                          
                    $cardao = new carrinhoDAO();                    
                    $produtos = $cardao->selectProdutosPedido($_GET['cod']);
                                                          
                    foreach ($produtos as $value){                        
                        detalhePedidoProduto($value[0],$value[1]);                    
                    }
                    
                    $t = $cardao->total($_GET['cod']);
                    echo 'Total do pedido:'.$t[0];
                    ?>

                 
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