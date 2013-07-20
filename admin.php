
<?php
include 'session_start.php';
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Administração - Lolwtf Mobile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/boxOver.js"></script>                
        <link rel="stylesheet" href="jquery-ui.min.css" />

        <script src="js/jquery-2.0.2.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/boxOver.js"></script>
        

        <script>
            $(function() {
                $("#accordion").accordion(
<?php
if (isset($_GET['action']) && $_GET['action'] == 'pessoa')
    echo '{active: 1}';
if (isset($_GET['action']) && $_GET['action'] == 'fabricante')
    echo '{active: 2}';
?>
                );
                    $(document).ready(function(){
    $("#datepicker").datepicker({
 onSelect: function(dateText, inst) { alert(dateText);document.getElementById('datepicker2').value=dateText; }
}
);
  });

                $("#datepicker").datepicker({
                    dateFormat: "dd/mm/yy",
                    dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText: "Próximo",
                    prevText: "Anterior",
                    weekHeader: "Semana",
                    changeMonth: true,
                    changeYear: true
                });

                $("#datepicker2").datepicker({
                    dateFormat: "dd/mm/yy",
                    dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText: "Próximo",
                    prevText: "Anterior",
                    weekHeader: "Semana",
                    changeMonth: true,
                    changeYear: true
                });

                $("#datepicker3").datepicker({
                    dateFormat: "dd/mm/yy",
                    dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
                    dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S"],
                    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    nextText: "Próximo",
                    prevText: "Anterior",
                    weekHeader: "Semana",
                    changeMonth: true,
                    changeYear: true
                });
                $(function() {
		$('#datepicker2').datepicker({
			autoSize: true,
			onSelect: function (dateText, inst) {
				$(this).parent('form').submit();
			}
		     });
	        });

            });
            var currentDate = $( ".selector" ).datepicker( "getDate" );
            document.write(currentDate);
            //document.getElementsByName()
        </script>

        <script>
            $(document).ready(function() {
                $("#produto").validate({
                    // Define as regras
                    rules: {
                        nome: {
                            // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                            required: true,
                            minlength: 3
                        },
                        descricao: {
                            required: true,
                            minlength: 10
                        },
                    },
                    // Define as mensagens de erro para cada regra
                    messages: {
                        nome: {
                            required: "Digite o seu nome",
                            minlength: "O nome deve ter pelo menos 3 caracteres"
                        },
                        descricao: {
                            required: "Digite o sua mensagem",
                            minlength: "Sua mensagem deve conter, no m&iacutenimo, 10 caracteres"
                        }

                    }
                });
            });

        </script>
 
        
        <script>
            $(document).ready(function() {
                $("#cliente").validate({
                    // Define as regras
                    rules: {
                        nome: {
                            // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                            required: true,
                            minlength: 3
                        },
                        email: {
                            // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                            required: true,
                            email: true
                        },
                        telefone: {
                            required: true,
                            minlength: 8
                        },
                        rg: {
                            required: true,
                            minlength: 9
                        },
                        cep: {
                            required: true,
                            minlength: 8
                        },
                        cpf: {
                            required: true,
                            minlength: 11
                        },
                        nascimento: {
                            required: true,
                            minlength: 8
                        }
                    },
                    // Define as mensagens de erro para cada regra
                    messages: {
                        nome: {
                            required: "Digite o seu nome",
                            minlength: "O nome deve ter pelo menos 3 caracteres"
                        },
                        email: {
                            required: "Digite o seu e-mail para contato",
                            email: "Digite um e-mail v&aacutelido"
                        },
                        telefone: {
                            required: "Digite o seu telefone",
                            minlength: "Seu telefone deve ter pelo menos 8 n&uacutemeros"
                        },
                        rg: {
                            required: "Digite seu rg",
                            minlength: "O seu rg deve conter, no m&iacutenimo, 9 caracteres"
                        },
                        cep: {
                            required: "Digite seu CEP",
                            minlength: ""
                        },
                        cpf: {
                            required: "Digite seu CPF",
                            minlength: ""
                        }
                    }
                });
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#clitelefone").mask("(99)9999-9999");
                $("#prodpreco").mask("99999,99");
                $("#prodestoque").mask("999");
                $("#clicpf").mask("999.999.999-99");
                $("#clicep").mask("99.999-999");
                $("#clirg").mask("99.999.999-9");
                $("#prodpeso").mask("99999g");
                $("#proddimensao").mask("999x999x999");
            });
        </script>

        <?php
        require_once 'DAO/ProdutoDAO.php';
        require_once 'DAO/PessoaDAO.php';
        require_once 'DAO/EnderecoDAO.php';
        require_once 'DAO/MarcaDAO.php';
        $produto = new Produto();
        $pessoa = new Pessoa();
        $endereco = new Endereco();
        $fabricante = new Marca();


        $estados = array(
            "AC" => "Acre",
            "AL" => "Alagoas",
            "AM" => "Amazonas",
            "AP" => "Amapá",
            "BA" => "Bahia",
            "CE" => "Ceará",
            "DF" => "Distrito Federal",
            "ES" => "Espirito Santo",
            "GO" => "Goiás",
            "MA" => "Maranhão",
            "MG" => "Minas Gerais",
            "MS" => "Mato Grosso do Sul",
            "MT" => "Mato Grosso",
            "PA" => "Pará",
            "PB" => "Paraíba",
            "PE" => "Pernambuco",
            "PI" => "Piauí",
            "PR" => "Paraná",
            "RJ" => "Rio de Janeiro",
            "RN" => "Rio Grande do Norte",
            "RO" => "Rondônia",
            "RR" => "Roraima",
            "RS" => "Rio Grande do Sul",
            "SC" => "Santa Catarina",
            "SE" => "Sergipe",
            "SP" => "São Paulo",
            "TO" => "Tocantins"
        );


        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'produto':
                    if (isset($_GET['cod'])) {
                        $pdao = new ProdutoDAO();
                        $select = $pdao->selectByCod($_GET['cod']);
                        if ($select) {
                            $produto = $select;
                        } else {
                            header('Location: admin.php');
                        }
                    } else {
                        header('Location: admin.php');
                    }
                    break;

                case 'pessoa':


                    if (isset($_GET['cod'])) {
                        $pessoaDAO = new PessoaDAO();
                        $select = $pessoaDAO->selectByCod($_GET['cod']);
                        if ($select) {
                            $pessoa = $select;

                            $enderecoDAO = new EnderecoDAO();
                            $select2 = $enderecoDAO->selectByCod($pessoa->get('cod_end'));
                            if ($select2) {
                                $endereco = $select2;
                            } else {
                                header('Location: admin.php');
                            }
                        } else {
                            header('Location: admin.php');
                        }
                    } else {
                        header('Location: admin.php');
                    }
                    break;

                case 'fabricante':
                    if (isset($_GET['cod'])) {
                        $marcaDao = new MarcaDAO();
                        $select = $marcaDao->selectByCod($_GET['cod']);
                        if ($select) {
                            $fabricante = $select;
                        } else {
                            header('Location: admin.php');
                        }
                    } else {
                        header('Location: admin.php');
                    }
                    break;

                default:
                    header('Location: admin.php');
                    break;
            }
        }
        ?>     

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

                    <div id="accordion">

                        <h3>Produtos</h3>
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

                                            $categoria = $cdao->selectAll();

                                            foreach ($categoria as $value) {

                                                if ($value->get('cod') == $produto->get('categoria'))
                                                    echo "<option selected value='" . $value->get('cod') . "'>" . $value->get('nome') . "</option>";
                                                else
                                                    echo "<option value='" . $value->get('cod') . "'>" . $value->get('nome') . "</option>";
                                            }
                                            ?>
                                        </select>


                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Dimensões:</strong></label>
                                        <input type="text" class="contact_input" id="proddimensao" name="dimensoes" value="<?php echo $produto->get('dimensoes') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Preço:</strong></label>
                                        <input type="text" id="prodpreco" class="contact_input" name="preco" value="<?php echo $produto->get('preco') ?>" />
                                    </div>


                                    <div class="form_row">
                                        <label class="contact"><strong>Peso:</strong></label>
                                        <input type="text" class="contact_input" id="prodpeso" name="peso" value="<?php echo $produto->get('peso') ?>" />
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Estoque:</strong></label>
                                        <input type="text" id="prodestoque" class="contact_input" name="estoque" value="<?php echo $produto->get('estoque') ?>" />
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Imagem:</strong></label>
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
                        <h3>Clientes</h3>

                        <div>
                            <div class="contact_form">

                                <form action="pesquisaPessoa.php" method="get">
                                    <input type="text" name="pesquisa" class="newsletter_input" value=""/>
                                    <input class="submit" type="submit" value="Pesquisar" name="tipo"/>
                                </form>

                                <form id="cliente" method="post" action="dao/pessoaAction.php">

                                    <input type="hidden" name="id" value="<?php echo $pessoa->get('id') ?>">

                                    <div class="form_row">
                                        <label class="contact"><strong>Nome completo:</strong></label>
                                        <input type="text" name="nome" class="contact_input" value="<?php echo $pessoa->get('nome') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Email:</strong></label>
                                        <input type="text" name="email" class="contact_input" value="<?php echo $pessoa->get('email') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Telefone:</strong></label>
                                        <input type="text" name="telefone" id="clitelefone" class="contact_input" value="<?php echo $pessoa->get('telefone') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>RG:</strong></label>
                                        <input type="text" name="rg" id="clirg" class="contact_input" value="<?php echo $pessoa->get('rg') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>CPF:</strong></label>
                                        <input type="text" name="cpf" id="clicpf" class="contact_input" value="<?php echo $pessoa->get('cpf') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Data de nascimento:</strong></label>
                                        <input type="text" name="nascimento" class="contact_input" id="datepicker" value="<?php echo $pessoa->get('nascimento') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Nivel de Acesso:</strong></label>
                                        <input type="text" name="nivel_d_aces" class="contact_input" value="<?php echo $pessoa->get('nivel_d_aces') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Nova senha:</strong></label>
                                        <input type="text" class="contact_input" name="senha" />
                                    </div>

                                    <input type="hidden" name="cod_end" value="<?php echo $endereco->get('cod_end') ?>">

                                    <div class="form_row">
                                        <label class="contact"><strong>Rua:</strong></label>
                                        <input type="text" name="rua" class="contact_input" value="<?php echo $endereco->get('rua') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>CEP:</strong></label>
                                        <input type="text" name="cep" id="endcep" class="contact_input" value="<?php echo $endereco->get('cep') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Número:</strong></label>
                                        <input type="text" name="num" class="contact_input" value="<?php echo $endereco->get('num') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Complemento:</strong></label>
                                        <input type="text" name="complemento"class="contact_input" value="<?php echo $endereco->get('complemento') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Cidade:</strong></label>
                                        <input type="text" name="cidade" class="contact_input" value="<?php echo $endereco->get('cidade') ?>"/>
                                    </div>

                                    <div class="form_row">
                                        <label class="contact"><strong>Estado:</strong></label>                                 
                                        <select name="estado" class="contact_input" >
                                            <?php
                                            foreach ($estados as $key => $value) {

                                                if ($key == $endereco->get('estado'))
                                                    echo "<option selected value='" . $key . "'>" . $value . "</option>";
                                                else
                                                    echo "<option value='" . $key . "'>" . $value . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form_row">
                                        <input class="submit" type="submit" value="Atualizar" name="acao"/>
                                        <input class="submit" type="submit" value="Deletar" name="acao"/>
                                    </div>
                                </form> 

                            </div>
                        </div>

                        <h3>Fabricantes</h3>

                        <div>
                            <div class="contact_form">
                                <table>
                                    <?php
                                    foreach ($marcas as $value) {
                                        ?>

                                        <tr><td><?php echo $value->get('codmarc') ?> </td><td><?php echo $value->get('nome') ?> </td><td><a href="admin.php?action=fabricante&cod=<?php echo $value->get('codmarc') ?>">Editar</a></td></tr>

                                        <?php
                                    }
                                    ?>    
                                </table>

                                <form id="fabricante" method="post" action="dao/marcaAction.php">

                                    <input type="hidden" name="codmarc" value="<?php echo $fabricante->get('codmarc') ?>">

                                    <div class="form_row">
                                        <label class="contact"><strong>Nome:</strong></label>
                                        <input type="text" name="nome" class="contact_input" value="<?php echo $fabricante->get('nome') ?>"/>
                                    </div>



                                    <div class="form_row">
                                        <input class="submit" type="submit" value="Novo" name="tipo"/>
                                        <input class="submit" type="submit" value="Atualizar" name="tipo"/>
                                        <input class="submit" type="submit" value="Deletar" name="tipo"/>
                                    </div>
                                </form> 

                            </div>
                        </div>

                        <h3>Relatórios</h3>

                        <div>
                            <div>
                           <form method='post' action='relatorios.php'>
                                <div class='form_row'>
                                    <label class='contact'><strong>De: </strong></label>
                                    <input type="text" class="contact_input" id="datepicker2" name="datepicker2" value="date"/>
                                </div>
                                <div class='form_row'>
                                    <label class='contact'><strong>At&eacute: </strong></label>
                                    <input type="text" class="contact_input" id="datepicker3" name="data2" value="date"/>
                                </div>
                                <br/>
                                <br/>

                               
                                    <input type='radio' name='op' value='op1'>
                                    Clientes
                                    <br/>
                                    <input type='radio' name='op' value='op2'>
                                    Fabricantes
                                    <select name="cod_marc" class="contact_input">
                                        <?php
                                        foreach ($marcas as $value)
                                            echo "<option selected value='" . $value->get('codmarc') . "'>" . $value->get('nome') . "</option>";
                                        ?>
                                    </select>
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
