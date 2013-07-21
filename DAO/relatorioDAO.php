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
     function selectByMarca($cod, $data1, $data2)
    {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT contem.data, produto.nome, SUM(contem.quantidade) AS quant, SUM(contem.quantidade * produto.preco) AS total,
            produto.preco FROM  marca, produto, contem  WHERE contem.cod_prod = produto.cod_prod 
            AND produto.cod_marc = marca.codmarc AND marca.codmarc = ? AND contem.data BETWEEN ? AND  ?  GROUP BY produto.nome 
            ORDER BY total");
        $stmt->bind_param('iss', $cod);
        $stmt->execute();
        $stmt->bind_result($tempo, $produtonome, $quant_vend, $total, $produtopreco);// string, string, string, integer
        while ($stmt->fetch()) {
           $p = new Produto(); 
           echo "data".$data1.$data2;
           //$p->set('data', $data);
           $p->set('nome', $produtonome);   
           $p->set('quant_vend', $quant_vend);
           $p->set('arrecadacao', $total);
           echo $produtonome.":  quantidade: ".$quant_vend." total: ".$total."<br>";
           $p->set('preco', $produtopreco);                          
           $result[]=$p;
        }       
        $stmt->close();        
        return $result;
    }    
}
?>
