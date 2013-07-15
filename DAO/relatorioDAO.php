<?php
require_once 'DAO.PHP';
require_once 'connection.php';
require_once 'marcaDAO.php';
require_once 'pessoaDAO.php';

class relatorioDAO extends DAO {
    function  selectByCiente() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT nome, rg, cpf, id FROM pessoa");
        $stmt->execute();
        $stmt->bind_result($nome, $rg, $cpf, $id);//, $telefone, $senha, $email, $rg, $cpf, $nivel_d_aces, $cod_end,$id,$nascimento);
        $result = array();
        while ($stmt->fetch()) {
            $p = new Marca();
            $p->set('nome', $nome);            
            $p->set('rg', $rg);
            $p->set('cpf', $cpf);            
            $p->set('id', $id);            
            $result[] = $p;
        }
        $stmt->close();
        return $result;
    }       
     function selecByMarca()
    {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT nome FROM marca");
        $stmt->execute();
        $stmt->bind_result($nome); //, $codmarc);
        $result = array();
        while ($stmt->fetch())
        {
            $p = new Marca();
            $sp->set('nome', $nome);
            //$sp->set('codmarc', $codmarc);
            $result[]=$p;
        }
        $stmt->close();
        return $result;
        }
    
}
?>
