<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO_Produto
 *
 * @author Codification
 */
require_once 'connection.php';
require_once 'Produto.php';
require_once 'DAO.php';

class ProdutoDAO  extends DAO {


    function insert($produto) {


        $stmt = $this->con->stmt_init();

        $stmt->prepare("INSERT INTO PRODUTO (nome, descricao, estoque, peso, cod_marc, preco, categoria,dimensoes) VALUES (?,?,?,?,?,?,?,?)");
        if ($stmt) {


            $stmt->bind_param("ssiiis", $produto->get('nome'), $produto->get('descricao'), $produto->get('estoque'), $produto->get('peso'), $produto->get('cod_marc'), $produto->get('preco'), $produto->get('categoria'),$produto->get('dimensoes'));

            $stmt->execute();
            $err = $stmt->errno;
            $stmt->close();

            return $err;
        }
    }

    function  selectAll() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM produto");
        $stmt->execute();
        $stmt->bind_result($nome, $descricao, $cod_prod,$categoria, $estoque, $peso, $cod_marc, $preco, $dimencoes);

        $result = array();



        while ($stmt->fetch()) {

            $p = new Produto();


            $p->set('nome', $nome);
            $p->set('descricao', $descricao);
            $p->set('cod_prod', $cod_prod);
            $p->set('estoque', $estoque);
            $p->set('peso', $peso);
            $p->set('cod_marc', $cod_marc);
            $p->set('preco', $preco);
            $p->set('dimencoes', $dimencoes);
             $p->set('categoria', $categoria);

            $result[] = $p;

        }


        $stmt->close();

        return $result;
    }
    
    
    function  selectByCod($cod) {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM produto WHERE cod_prod = ?");
$stmt->bind_param("i", $cod);
        
        $stmt->execute();

        $stmt->bind_result($nome, $descricao, $cod_prod,$categoria, $estoque, $peso, $cod_marc, $preco, $dimencoes);

        while ($stmt->fetch()) {

            $p = new Produto();

            $p->set('nome', $nome);
            $p->set('descricao', $descricao);
            $p->set('cod_prod', $cod_prod);
            $p->set('estoque', $estoque);
            $p->set('peso', $peso);
            $p->set('cod_marc', $cod_marc);
            $p->set('preco', $preco);
            $p->set('dimencoes', $dimencoes);
            $p->set('categoria', $categoria);

        }
        
        $stmt->close();
        return $p;
    }

    function  selectLike($pesquisa) {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM produto WHERE concat_ws(' ',nome,descricao,preco) LIKE ?");
        $param = "%".$pesquisa."%";
$stmt->bind_param("s", $param);
        
        $stmt->execute();

        $stmt->bind_result($nome, $descricao, $cod_prod,$categoria, $estoque, $peso, $cod_marc, $preco, $dimencoes);

        $result = array();



        while ($stmt->fetch()) {

            $p = new Produto();


            $p->set('nome', $nome);
            $p->set('descricao', $descricao);
            $p->set('cod_prod', $cod_prod);
            $p->set('estoque', $estoque);
            $p->set('peso', $peso);
            $p->set('cod_marc', $cod_marc);
            $p->set('preco', $preco);
            $p->set('dimencoes', $dimencoes);
            $p->set('categoria', $categoria);

            $result[] = $p;

        }


        $stmt->close();

        return $result;
    }
   
    
}

?>
