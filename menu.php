<div id="menu_tab">
    <ul class="menu">
        <li>
            <a href="index.php" class="nav">Home</a>
        </li>
        
        <?php
          if((isset($_SESSION['logado']) && $_SESSION['logado'])){
              
          ?>
        <li class="divider"></li>
        <li>
            <a href="conta.php" class="nav">Minha Conta</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="carrinho.php" class="nav">Meu Carrinho</a>
        </li>
        
        <?php }?>
        
        
        <li class="divider"></li>
        <li>
            <a href="quemsomos.php" class="nav">Quem Somos</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="contato.php" class="nav">Contato</a>
        </li>

                <?php
                if((isset($_SESSION['admin']) && $_SESSION['admin'])){
                ?>
        <li class="divider"></li>
        <li>
            <a href="admin.php" class="nav">Administração do site</a>
        </li>

                    <?php
                }
                
                if((isset($_SESSION['logado']) && $_SESSION['logado'])){
                ?>
        <li class="divider"></li>
        <li>
            <a href="login_manager.php?logout=1" class="nav" style = " font-size: 15 ; color: tomato; ">Logout ( <?php echo $_SESSION['nome'] ?> )</a>
        </li>

                <?php 
                } else{
                ?>
        
           <li class="divider"></li>
        <li>
            <a href="novaconta.php" class="nav" style = " font-size: 15 ; color: tomato; ">Criar uma conta</a>
        </li>
        
        <?php } ?>
        
    </ul>

</div>
