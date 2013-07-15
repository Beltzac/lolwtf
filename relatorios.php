<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table>
        <?php
        require_once 'DAO/relatorioDAO.php';
        $dao = new relatorioDAO();
        $lista = $dao->selectByCiente();
       // while($lista)
        //{
            echo "<tr><td>".$lista['nome']."</td></tr>";
        //}        
        // put your code here
        ?>
            </table>
    </body>
</html>
