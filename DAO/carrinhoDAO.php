<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of carrinhoDAO
 *
 * @author Codification
 */

require_once 'connection.php';
require_once 'DAO.php';
class carrinhoDAO extends DAO {
    
     function  total($pedido) {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("select sum(total), count(total) from (SELECT (quantidade * preco) as total FROM contem WHERE cod_ped = ?) as total");
        $stmt->bind_param("i", $pedido);
        
        $stmt->execute();
        echo $stmt->error;

        $stmt->bind_result($total,$count);

        while ($stmt->fetch()) {      
            $p = array($total,$count);
        }
        
        $stmt->close();
        return $p;
    }
    
}

?>
