<?php

function imagem($cod) {
    if (file_exists("imagensProdutos\\" . $cod . ".jpg")) {
        return "imagensProdutos\\$cod.jpg";
    } else {
        return"images\\indefinido.jpg";
    }
}

function caixaProduto(Produto $produto) {

    $codigo = $produto->get('cod_prod');
    $nome = $produto->get('nome');
    $preco = $produto->get('preco');
    ?>

    <div class="prod_box">

        <div class="center_prod_box">
            <div class="product_title">
                <a href="details.php?cod=<?php echo $codigo ?>"><?php echo $nome ?></a>
            </div>
            <div class="product_img">
                <a href="details.php?cod=<?php echo $codigo ?>"><img src="<?php echo imagem($codigo) ?>" alt="" title="" border="0" width="100"/></a>
            </div>
            <div class="prod_price">
                <span class="price">R$ <?php echo $preco ?></span>
            </div>
        </div>

        <div class="prod_details_tab">
            <a href="DAO/carrinhoAction.php?tipo=adicionarProduto&cod_prod=<?php echo $codigo ?>" class="prod_buy">+ Carrinho</a>
            <a href="details.php?cod=<?php echo $codigo ?>" class="prod_details">Detalhes</a>
            <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin']){                                   
              
                echo  '<a href = admin.php?action=produto&cod=' . $produto->get('cod_prod') .' class="prod_buy" style="color:red">Modificar</a>';
                                  
             }
            ?>
        </div>
    </div>

    <?php
}

function carrinhoProduto(Produto $produto, $quantidade) {

    $codigo = $produto->get('cod_prod');
    $nome = $produto->get('nome');
    $preco = $produto->get('preco');
    ?>
    <script>
        $(function() {
            $(<?php echo "\"#spinner$codigo\""; ?>).spinner({
                step: 1,
                numberFormat: "n",
                min: 1,
                max: 20
            });
        });
    </script>

    <div class="carrinho_box">

        <div class="carrinho_center_prod_box2">
            <div class="product_img2">
                <a href="details.php?cod=<?php echo $codigo ?>"><img src="<?php echo imagem($codigo) ?>" alt="" title="" border="0"  width="100"/></a>
            </div>
            <div class="product_title2">
                <a href="details.php?cod=<?php echo $codigo ?>"><?php echo $nome ?></a>
            </div>

            <div class="prod_price2">
                <span class="price">R$ <?php echo $preco ?></span>
            </div>
            <form action="DAO/carrinhoAction.php" method="get" id="<?php echo $codigo ?>">
                
            <input type="hidden" value="atualizarQuantidade" name="tipo" />
            <input type="hidden" value="<?php echo $codigo ?>" name="cod_prod" />
            
            <div class="prod_price2">
                <p>
                    <label for="<?php echo "spinner$codigo"; ?>">Quantidade:</label>
                    <input id="<?php echo "spinner$codigo"; ?>" name="quantidade" value="<?php echo $quantidade ?>" />
                </p>
            </div>
              
           
            
            <div class="carrinho_prod_details_tab2">
                 <a href="details.php?cod=<?php echo $codigo ?>" class="prod_details">Detalhes</a>
                 
                <a href="dao/carrinhoAction.php?tipo=removerProduto&cod_prod=<?php echo $codigo ?>" class="prod_buy">Remover</a>
                
                	
                <input type="submit" id="<?php echo 'but'.$codigo ?>" style="display:none;">
               
                <a href="#" onclick="document.getElementById('<?php echo 'but'.$codigo ?>').click();" class="prod_buy">Atualizar</a>
            </div>
             </form>
        </div>
        <br/>

    </div>
    <br/>

    <?php
}
?>