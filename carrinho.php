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
                    $pdao = new ProdutoDAO();

                    $data = $pdao->selectAll();


                    foreach ($data as $value)
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