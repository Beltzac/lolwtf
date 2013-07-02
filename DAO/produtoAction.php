<?php

require_once 'ProdutoDAO.php';

function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }
}

$p = new Produto();



        $p->set("nome", $_POST["nome"]);
        $p->set("descricao", $_POST["descricao"]);
        $p->set("estoque", $_POST["estoque"]);
        $p->set("peso", $_POST["peso"]);
        $p->set("cod_marc", $_POST["cod_marc"]);
        $p->set("preco", $_POST["preco"]);
        $p->set('categoria', $_POST["categoria"]);


$dao = new ProdutoDAO();
$err = $dao->insert($p);

if (!$err){



    move_uploaded_file($_FILES['imagem']['tmp_name'], "../imagensProdutos/".$dao->lastID().".jpg");
        
      redirect();  
}
else {
    echo 'Erro!';
}

?>
