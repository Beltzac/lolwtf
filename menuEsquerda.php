
	<?php 
	require_once 'funcoes.php';
        require_once 'DAO/ProdutoDAO.php';
        
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
		<li class="odd">
			<a href="pesquisa.php">Celulares</a>
		</li>
		<li class="even">
			<a href="pesquisa.php">Smartphones</a>
		</li>
		<li class="odd">
			<a href="pesquisa.php">Carregadores</a>
		</li>
		<li class="even">
			<a href="pesquisa.php">Accessórios</a>
		</li>
		<li class="odd">
			<a href="pesquisa.php">Capas</a>
		</li>
		<li class="even">
			<a href="pesquisa.php">Tablets</a>
		</li>
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
