<?php
include 'session_start.php';
if(!$_SESSION['admin']){
    
    header('Location: index.php');
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Administração - Lolwtf Mobile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/boxOver.js"></script>

        <link rel="stylesheet" href="jquery-ui.min.css" />
        <script src="js/jquery-2.0.2.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>

        <script>
            $(function() {
                $("#accordion").accordion();

                $("#datepicker").datepicker({
                    dateFormat : "dd/mm/yy",
                    dayNames : ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin : ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort : ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames : ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort : ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText : "Próximo",
                    prevText : "Anterior",
                    weekHeader : "Semana",
                    changeMonth : true,
                    changeYear : true
                });
				
                $("#datepicker2").datepicker({
                    dateFormat : "dd/mm/yy",
                    dayNames : ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin : ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort : ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames : ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort : ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText : "Próximo",
                    prevText : "Anterior",
                    weekHeader : "Semana",
                    changeMonth : true,
                    changeYear : true
                });
				
                $("#datepicker3").datepicker({
                    dateFormat : "dd/mm/yy",
                    dayNames : ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin : ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort : ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames : ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort : ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText : "Próximo",
                    prevText : "Anterior",
                    weekHeader : "Semana",
                    changeMonth : true,
                    changeYear : true
                });

            });
        </script>

    </head>
    <body>

        <?php
        require_once 'DAO/ProdutoDAO.php';
        $produto = new Produto();
        
        if(isset($_GET['action']) && isset($_GET['cod'])){
            switch ($_GET['action']) {
                case 'produto':
                    $pdao = new ProdutoDAO();
                    
$select = $pdao->selectByCod($_GET['cod']);
if($select){
$produto = $select;
}else{
    header('Location: admin.php');
}
                    break;


                default:
                    break;
            }
                       
        }
        
        ?>     
           
        
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

                    <div id="accordion">

                        <h3>Administrar Produtos</h3>
                        <div>
                            <div class="contact_form">
                                <form id="produto" method="post" action="DAO/produtoAction.php" enctype="multipart/form-data">

                              <input type="hidden" value="<?php echo $produto->get('cod_prod') ?>" name="codigo" />

                                    <div class="form_row">
                                        <label class="contact"><strong>Nome:</strong></label>
                                        <input type="text" class="contact_input" name="nome" value="<?php echo $produto->get('nome') ?>" />
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Fabricante:</strong></label>
                                        
                                        <select name="cod_marc" class="contact_input">
                                            <?php
                                            require_once 'DAO/MarcaDAO.php';
                                            $mdao = new MarcaDAO();

                                            $marcas = $mdao->selectAll();

                                            foreach ($marcas as $value) {
                                                if ($value->get('codmarc') == $produto->get('cod_marc'))
                                                echo "<option selected value='" . $value->get('codmarc') . "'>" . $value->get('nome') . "</option>";
                                                else
                                                     echo "<option value='" . $value->get('codmarc') . "'>" . $value->get('nome') . "</option>";
                                            }
                                            ?>
                                        </select>


                                    </div>
                                    
                                    <div class="form_row">
                                        <label class="contact"><strong>Categoria:</strong></label>
                                        
                                        <select name="categoria" class="contact_input" >
                                            <?php
                                            require_once 'DAO/CategoriaDAO.php';
                                            $cdao = new CategoriaDAO();

                                            $categorias = $cdao->selectAll();

                                            foreach ($categorias as $value) {
                                                
                                                if($value->get('cod') == $produto->get('categoria'))
                                                 echo "<option selected value='" . $value->get('cod') . "'>" . $value->get('nome') . "</option>";
                                                 else
                                                echo "<option value='" . $value->get('cod') . "'>" . $value->get('nome') . "</option>";
                                            }
                                            ?>
                                        </select>


                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Dimensões:</strong></label>
                                        <input type="text" class="contact_input" name="dimensoes" value="<?php echo $produto->get('dimensoes') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>preço:</strong></label>
                                        <input type="text" class="contact_input" name="preco" value="<?php echo $produto->get('preco') ?>" />
                                    </div>


                                    <div class="form_row">
                                        <label class="contact"><strong>peso:</strong></label>
                                        <input type="text" class="contact_input" name="peso" value="<?php echo $produto->get('peso') ?>" />
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>estoque:</strong></label>
                                        <input type="text" class="contact_input" name="estoque" value="<?php echo $produto->get('estoque') ?>" />
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>imagem:</strong></label>
                                        <input type="file" class="contact_input" name="imagem" />
                                    </div>


                                    <div class="form_row">
                                        <label class="contact"><strong>Descrição:</strong></label>
                                        <textarea class="contact_textarea" name="descricao" ><?php echo $produto->get('descricao') ?></textarea>  

                                    </div>

                                    <div class="form_row">
                                        <input class="submit" type="submit" value="Novo" name="tipo"/>
                                        <input class="submit" type="submit" value="Atualizar" name="tipo"/>
                                        <input class="submit" type="submit" value="Deletar" name="tipo"/>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <h3>Administrar clientes</h3>

                        <div>
                            <div class="contact_form">

                                <div class="form_row">
                                    <label class="contact"><strong>Nome completo:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>Email:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>Telefone:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>RG:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>CPF:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>Data de nascimento:</strong></label>
                                    <input type="text" class="contact_input" id="datepicker" />
                                </div>

                                <div class="form_row">
                                    <label class="contact"><strong>Senha:</strong></label>
                                    <input type="text" class="contact_input" />
                                </div>

                                <div class="form_row">
                                    <a href="#" class="prod_details">Novo</a><a href="#" class="prod_details">Atualizar</a>
                                </div>

                            </div>
                        </div>

                        <h3>Relatórios</h3>

                        <div>
                            <div>

                                <div class='form_row'>
                                    <label class='contact'><strong>De: </strong></label>
                                    <input type="text" class="contact_input" id="datepicker2" />
                                </div>
                                <div class='form_row'>
                                    <label class='contact'><strong>At&eacute: </strong></label>
                                    <input type="text" class="contact_input" id="datepicker3" />
                                </div>
                                <br/>
                                <br/>

                                <form method='post' action='admin.php'>
                                    <input type='radio' name='op' value='op1'>
                                    Clientes
                                    <br/>
                                    <input type='radio' name='op' value='op2'>
                                    Fabricantes
                                    <br/>
                                    <input type='radio' name='op' value='op3'>
                                    Venda
                                    <br/>
                                    <input type='submit' value='OK'>
                                </form>

                            </div>

                        </div>
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