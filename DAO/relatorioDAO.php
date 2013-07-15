<?php
require_once 'DAO.PHP';
require_once 'connection.php';
require_once 'marcaDAO.php';
require_once 'relat.php';

class relatorioDAO extends DAO {
    function  selectByCiente() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT nome FROM marca");
        $stmt->execute();
        $stmt->bind_result($nome);//, $telefone, $senha, $email, $rg, $cpf, $nivel_d_aces, $cod_end,$id,$nascimento);
        $result = array();
        while ($stmt->fetch()) {
            $p = new Marca();
            $p->set('nome', $nome);
            /*$p->set('telefone', $telefone);
            $p->set('senha', $senha);
            $p->set('email', $email);
            $p->set('rg', $rg);
            $p->set('cpf', $cpf);
            $p->set('nivel_d_aces', $nivel_d_aces);
            $p->set('cod_end', $cod_end);
            $p->set('id', $id);
            $p->set('nascimento', $nascimento);*/
            $result[] = $p;
        }
        $stmt->close();
        return $result;
    }       
}
?>
