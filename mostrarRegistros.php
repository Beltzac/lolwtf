<html>
    <head>
    </head>
    <body>

        <table  border="1">
            <tr>
                <td>Imagem</td> <td>Codigo</td> <td>Nome</td> <td>Marca</td> <td>Categoria</td><td>Editar</td>
            </tr>
            
            <?php
            
            function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }
}


            switch ($_GET['action']) {
                case 'produto':
                    
                    require_once 'DAO/ProdutoDAO.php';
                    require_once 'DAO/MarcaDAO.php';
                    require_once 'DAO/CategoriaDAO.php';
                    require_once 'funcoes.php';

                    $pdao = new ProdutoDAO();
                    $mdao = new MarcaDAO();
                    $cdao = new CategoriaDAO();

                    $produtos = $pdao->selectAll();

                    foreach ($produtos as $value) {

                        //busca o nome da marca e categoria
                        $marca = $mdao->selectByCod($value->get('cod_marc'))->get('nome');
                        $categoria = $cdao->selectByCod($value->get('categoria'))->get('nome');
                        
                        echo'<tr>';

                        echo '<td>' . '<img src =' . imagem($value->get('cod_prod')) . ' alt="" title="" border="0" width="80"/></td>
                              <td>' . $value->get('cod_prod') . '</td>    
                              <td>' . $value->get('nome') . '</td>
                              <td>' . $marca . '</td>
                              <td>' . $categoria . '</td>
                              <td>' . '<a href = admin.php?action=produto&cod=' . $value->get('cod_prod') . '>Editar</a></td>';
                        echo '</tr>';
                    }

                    break;

                default:
                    redirect();
                    break;
            }
            ?>
        </table>
    </body>
</html>
