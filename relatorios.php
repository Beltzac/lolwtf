<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
        <?php
        require_once 'DAO/relatorioDAO.php';
        date_default_timezone_set('America/Sao_Paulo');
        //require_once 'funcoes.php';
        //convertendo o codmarc para int
        $str = $_POST['cod_marc'];
        $cod = (int)$str;        
        
        $opcao = $_POST['op'];
        if($opcao == "op1"){
         $dao = new relatorioDAO();
         $lista = $dao->selectByCiente();
         foreach ($lista as $value){
            echo "<tr><td>Nome:</td><td>".$value->get('nome')."</td></tr>";  
            echo "<tr><td>RG:</td><td>".$value->get('rg')."</td></tr>"; 
            echo "<tr><td>CPF:</td><td>".$value->get('cpf')."</td></tr>"; 
            echo "<tr><td>id:</td><td>".$value->get('id')."</td></tr>"; 
         }
        }
         if($opcao == "op2"){          
          $dao2 = new relatorioDAO();
          $lista2 = $dao2->selectByMarca($cod);
          $data = $_POST['datepicker2'];
          $amanha = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
           echo "Amanhã é ".date("Y/m/d", $amanha)."<br>"; echo gettype($amanha)."<br>";
          echo $data."<br>";
         echo gettype($data);
         var_dump($data);         
          foreach ($lista2 as $key){                   
               echo "<tr><td>nome_produto:</td><td>".$key->get('nome')."</td></tr>";
               echo "<tr><td>preco:</td><td>".$key->get('preco')."</td></tr>";
               echo "<tr><td>quantidade vendida</td><td>".$key->get('quant_vend')."</td></tr>";
               echo "<tr><td>arrecadação</td><td>".$key->get('arrecadacao')."</td></tr>";                           
          }
         }         
        ?>  
        </table>
    </body>
</html>