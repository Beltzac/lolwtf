<?php
include 'session_start.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lolwtf Mobile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/boxOver.js"></script>
    </head>
    <body>

        <div id="main_container">

            <?php
            include ('header.php');
       
            ?>

            <div id="main_content">

                <?php
                include ('menu.php');
                include ('menuEsquerda.php');
                ?>

                <div class="center_content">

                    <div class="oferta">
                        <img src="images/SmartphoneSamsungGalaxySIILiteDesbloqueadoTIM.jpg"  height="113" border="0" class="oferta_img" alt="" title="" />

                        <div class="oferta_details">
                            <div class="oferta_title">
                                Samsung Galaxy S II Lite
                            </div>
                            <div class="oferta_text">
                                Excelente custo benefício feito pela Samsung, conta com todos os recursos básicos que você precisa!
                            </div>
                            <a href="details.php" class="prod_buy">Detalhes</a>
                        </div>
                    </div>

                    <div class="center_title_bar">
                        Produtos em Destaque
                    </div>

                    <?php
                        require_once 'DAO/ProdutoDAO.php';
                        include_once 'php_fast_cache.php';
                         
                         $data = phpFastCache::get("index");
        
        if(!$data){
            $pdao = new ProdutoDAO();   
            $data = $pdao->selectAll(9);
            phpFastCache::set("index",$data,300);
        }    
                   
                       
                  
                    foreach ($data as $value) {
                     
                        
                        caixaProduto($value);
                        
                    }
                    ?>

                    <div class="center_title_bar">
                        Produtos Recomendados
                    </div>

                    <?php
                
                    

                    foreach ($data as $value) {

                        caixaProduto($value);
                        
                    }
                    ?>
                </div><!-- centro -->

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