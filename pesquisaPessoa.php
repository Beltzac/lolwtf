<?php
include 'session_start.php';
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Resultados da pesquisa - Lolwtf Mobile</title>
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
                include ('funcoes.php');
                include ('menu.php');
                include ('menuEsquerda.php');
                ?>

                <div class="center_content">
                    <form action="pesquisaPessoa.php" method="get">
                        <input type="text" name="pesquisa" class="newsletter_input" value=""/>
                        <input class="submit" type="submit" value="Pesquisar Pessoa" name="tipo"/>
                    </form>
                    <div class="center_title_bar">
                        Resultados da pesquisa
                    </div>

                    <?php
                    require_once 'DAO/PessoaDAO.php';

                    $pdao = new PessoaDAO();

                    if (isset($_GET['pesquisa'])) {
                        $pesquisa = $pdao->selectLike($_GET['pesquisa']);

                        foreach ($pesquisa as $pessoa) {

                            caixaPessoa($pessoa);
                        }
                    }
                    ?>

                </div>

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