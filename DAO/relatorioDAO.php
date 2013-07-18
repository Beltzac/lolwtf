<?php
require_once 'DAO.PHP';
require_once 'connection.php';
require_once 'marca.php';
require_once 'pessoaDAO.php';
require_once 'produtoDAO.php';
require_once 'contem.php';

class relatorioDAO extends DAO {
    function  selectByCiente() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT nome, rg, cpf, id FROM pessoa");
        $stmt->execute();
        $stmt->bind_result($nome, $rg, $cpf, $id);//, $telefone, $senha, $email, $rg, $cpf, $nivel_d_aces, $cod_end,$id,$nascimento);
        $result = array();
        while ($stmt->fetch()) {
            $p = new Pessoa();
            $p->set('nome', $nome);            
            $p->set('rg', $rg);
            $p->set('cpf', $cpf);            
            $p->set('id', $id);            
            $result[] = $p;
        }
        $stmt->close();
        return $result;
    }       
     function selectByMarca($cod)
    {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT marca.nome, produto.nome,  (produto.preco * contem.quantidade) AS total,
            produto.preco, contem.quantidade FROM marca, produto, contem WHERE contem.cod_prod = produto.cod_prod 
            AND produto.cod_marc = marca.codmarc AND marca.codmarc = ? ORDER BY total");
        $stmt->bind_param('i', $cod);
        $stmt->execute();
        $stmt->bind_result($marcanome, $produtonome, $total, $produtopreco, $contemquantidade);
        $result = array("marca"=>array(), "produto"=>array(), "contem"=>array());
        //$row = $stmt->num_rows;
        //echo $row."<br>";
        while ($stmt->fetch()) {
            $m = new marca();
            $p = new Produto();
            $c = new contem();
            $m->set('nome', $marcanome);
            echo $marcanome."<br>";
            $p->set('nome', $produtonome);
            echo $produtonome."<br>";
            $p->set('preco', $produtopreco);
            echo $total."<br>";
           // echo $produtopreco."<br>";
            $c->set('quantidade', $contemquantidade);
            //echo $contemquantidade."<br>";
            $result["marca"] = $m;
            $result["produto"] = $p;
            $result["contem"] = $c;
        }
        $stmt->close();
        return $result;
    }
    
}
?>
