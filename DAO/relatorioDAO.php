<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of relatorioDAO
 *
 * @author Rafael Kozar
 */
class relatorioDAO extends DAO {
    function  selectByCiente() {
        $stmt = $this->con->stmt_init();
        //"select sum(total), count(total) from (SELECT (quantidade * preco) as total FROM contem WHERE cod_ped = ?) as total";
        //$stmt->prepare("select sum(total), count(total) from (SELECT (quantidade * preco) as total FROM (SELECT * FROM contem WHERE data BETWEN WHERE cod_ped = ?) as total"");
        $stmt->execute();

        $stmt->bind_result($nome, $telefone, $senha, $email, $rg, $cpf, $nivel_d_aces, $cod_end,$id,$nascimento);

        $result = array();


        while ($stmt->fetch()) {

            $p = new Pessoa();


            $p->set('nome', $nome);
            $p->set('telefone', $telefone);
            $p->set('senha', $senha);
            $p->set('email', $email);
            $p->set('rg', $rg);
            $p->set('cpf', $cpf);
            $p->set('nivel_d_aces', $nivel_d_aces);
            $p->set('cod_end', $cod_end);
            $p->set('id', $id);
             $p->set('nascimento', $nascimento);

            $result[] = $p;

        }


        $stmt->close();

        return $result;
    }
    
    //put your code here
}

?>
