<?php
require_once 'DAO.PHP';
require_once 'connection.php';
require_once 'marca.php';
require_once 'pessoaDAO.php';
require_once 'produtoDAO.php';
require_once 'contem.php';
require_once 'relatorio.php';

class relatorioDAO extends DAO {
    function  selectByCiente() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT pessoa.nome, produto.nome, (contem.quantidade * produto.preco)AS arrecadacao 
            FROM pessoa, produto, contem WHERE pedido.id_p = pessoa.id AND pedido.cod_pedido = contem.cod_ped
             contem.cod_prod = produto.cod_prod");
        $stmt->execute();
        $stmt->bind_result($nome, $produto, $arrecadacao);
        //$result = array();
        while ($stmt->fetch()) {
            $p = new Relatorio();
            $p->set('nome_pessoa', $nome);            
            $p->set('nome', $produto);
            $p->set('arrecadacao', $arrecadacao);                                   
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
            AND produto.cod_marc = marca.codmarc AND marca.codmarc = ? GROUP BY produto.nome 
            ORDER BY total");
        $stmt->bind_param('i', $cod);
        $stmt->execute();
        $stmt->bind_result($tempo, $produtonome, $quant_vend, $total, $produtopreco);// string, string, string, integer
        while ($stmt->fetch()) {
           //echo "tempo: ".$tempo." data1: ".$data1." data2: ".$data2."<br>";
           list($dt_d1, $dt_m1, $dt_y1) = explode('/', $data1);
           list($dt_d2, $dt_m2, $dt_y2) = explode('/', $data2);
           $data1final = date("Y-m-d"." H:i:s", mktime(0, 0, 0, $dt_m1, $dt_d1, $dt_y1));
           $data2final = date("Y-m-d"." H:i:s", mktime(0, 0, 0, $dt_m2, $dt_d2, $dt_y2));
           //var_dump($data2final);
           //echo "aqui<br>";
           //var_dump($tempo);echo"depois";
           if(($tempo >= $data1final) && ($data2final >= $tempo)){
           $p = new Produto(); 
           echo $data1." ".$data2."<br>";
           //$p->set('data', $data);
           $p->set('data', $tempo);
           $p->set('nome', $produtonome);   
           $p->set('quant_vend', $quant_vend);
           $p->set('arrecadacao', $total);
           echo $produtonome.":  quantidade: ".$quant_vend." total: ".$total."<br>";
           $p->set('preco', $produtopreco);      
          // var_dump($p);
           $result[]=$p;
           }
        }       
        $stmt->close();        
      //  var_dump($result);
        return $result;
    }    
}
?>
