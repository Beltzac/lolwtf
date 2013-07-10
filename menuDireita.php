

	<?php 
	require_once 'funcoes.php';
        require_once 'DAO/ProdutoDAO.php';
        require_once 'DAO/MarcaDAO.php';
        require_once 'DAO/carrinhoDAO.php';
        include_once 'php_fast_cache.php';
        
       
        
	    $p = phpFastCache::get("produtoDireito");
        
        if(!$p){
            $pdao = new ProdutoDAO();
            $p = $pdao->selectByCod(11);
            phpFastCache::set("produtoDireito",$p,600);
        }

	$nome = $p->get('nome');
	$preco = $p->get('preco');
        $preco = $p->get('preco');
        $codigo = $p->get('cod_prod');
	$imagem = imagem($p->get('cod_prod'));
        
	?>

<div class="right_content">

	

	<div class="title_box">
		Pesquisa
	</div>
	<div class="border_box">
            <form action="pesquisa.php" method="get">
		<input type="text" name="pesquisa" class="newsletter_input" value=""/>
		  <input class="submit" type="submit" value="Pesquisar" name="tipo"/>
                </form>
	</div>
    
    <?php
    if  (isset($_SESSION['logado']) && $_SESSION['logado']){
        
        
       if(!isset($_SESSION['quantidadeProdutos']) || !isset($_SESSION['valorTotal'])){
           
           $caDAO = new carrinhoDAO();
    $total =  $caDAO->total($_SESSION['carrinho']);  
    $_SESSION['valorTotal'] = $total[0];  
    $_SESSION['quantidadeProdutos'] = $total[1];  
       }
    ?>
    
    	<div class="shopping_cart">
		<div class="title_box">
			Carrinho
		</div>

		<div class="cart_details">
			<?php echo $_SESSION['quantidadeProdutos'] ?> item(s)
			<br />
			<span class="border_cart"></span>
			Total: <span class="price">R$ <?php echo $_SESSION['valorTotal'] ?></span>
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
		 <?php
            
            
             $marcas = phpFastCache::get("marcas");
        
        if(!$marcas){
            $mdao = new MarcaDAO();
              $marcas = $mdao->selectAll();
            phpFastCache::set("marcas",$marcas,600);
        }
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

	<div class="banner_adds">

		<a href="#"><img src="images/bann1.jpg" alt="" title="" border="0" /></a>
	</div>

</div><!-- menu direita -->
