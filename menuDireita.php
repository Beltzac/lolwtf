

	<?php $r = rand(0, 5);
	include_once 'funcoes.php';

	$codigo = $r;

	$nome = $array[$codigo]['nome'];
	$preco = $array[$codigo]['preco'];
	$imagem = $array[$codigo]['imagem'];
	?>

<div class="right_content">

	

	<div class="title_box">
		Pesquisa
	</div>
	<div class="border_box">
		<input type="text" name="newsletter" class="newsletter_input" value=""/>
		<a href="pesquisa.php" class="join">Procurar</a>
	</div>
    
    <?php
    if  (isset($_SESSION['logado']) && $_SESSION['logado']){
    ?>
    
    	<div class="shopping_cart">
		<div class="title_box">
			Carrinho
		</div>

		<div class="cart_details">
			3 item(s)
			<br />
			<span class="border_cart"></span>
			Total: <span class="price">R$350,00</span>
		</div>

		<div class="cart_icon">
			<a href="carrinho.php" title=""><img src="images/shoppingcart.png" alt="" title="" width="35" height="35" border="0" /></a>
		</div>

	</div>
    
<?php }else{?>
    
<div class="login">
		<div class="title_box">
			Login
		</div>

    <form id="login" method="post" action="login_manager.php">
			E-mail:
			<input type="text" name="email" class="login_input" value=""/>
			Senha:
			<input type="password" name="senha" class="login_input" value=""/>
			<input class="join" type="submit" value="Login" />
			

		</form>
		<a href="novaconta.php" class="join">Criar uma conta</a>

	</div>

<?php } ?>

	<div class="title_box">
		Novidades
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

	<div class="title_box">
		Principais Fabricantes
	</div>

	<ul class="left_menu">
		<li class="odd">
			<a href="pesquisa.php">Apple</a>
		</li>
		<li class="even">
			<a href="pesquisa.php">Samsung</a>
		</li>
		<li class="odd">
			<a href="pesquisa.php">Nokia</a>
		</li>
		<li class="even">
			<a href="pesquisa.php">LG</a>
		</li>
		<li class="odd">
			<a href="pesquisa.php">Motorola</a>
		</li>
	</ul>

	<div class="banner_adds">

		<a href="#"><img src="images/bann1.jpg" alt="" title="" border="0" /></a>
	</div>

</div><!-- menu direita -->
