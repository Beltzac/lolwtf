
	<?php 
	require_once 'funcoes.php';
        require_once 'DAO/ProdutoDAO.php';
        require_once 'DAO/CategoriaDAO.php';
        
        $pdao = new ProdutoDAO();   

	$p = $pdao->selectByCod(27);

	$nome = $p->get('nome');
	$preco = $p->get('preco');
        $codigo = $p->get('cod_prod');
	$imagem = imagem($p->get('cod_prod'));
        
	?>

<div class="left_content">
	<div class="title_box">
		Categorias
	</div>

	<ul class="left_menu">
            <?php
            
            $cdao = new CategoriaDAO();
            $marcas = $cdao->selectAll();
            $i = 0;
            foreach ($marcas as $value) {

                if($i % 2 ==0){                    
                echo '<li class="odd">';
                }else{
                echo '<li class="even">';
                }                
                echo '<a href="pesquisa.php?pesquisa='.$value->get('nome').'">'.$value->get('nome').'</a></li>';
                $i++;

            }
            
		
                
                ?>
	</ul>

	<div class="title_box">
		Promoção!
	</div>
	<div class="border_box">
		<div class="product_title">
			<a href="details.php?cod=<?php echo $codigo; ?>"><?php echo $nome; ?></a>
		</div>
		<div class="product_img">
			<a href="details.php?cod=<?php echo $codigo; ?>"><img src="<?php echo $imagem; ?>" alt="" title="" border="0" height = "100"/></a>
		</div>
		<div class="prod_price">
			<span class="price">R$ <?php echo $preco; ?></span>
		</div>
	</div>

	

	<div class="banner_adds">

		<a href="#"><img src="images/bann2.jpg" alt="" title="" border="0" /></a>
	</div>

</div><!-- menu esquerda -->
