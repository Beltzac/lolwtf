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
        $data1 = $_POST['datepicker2'];
        $data2 = $_POST['thedate'];  
        $cod = (int)$str;        
        $data1pas = strtotime($data1);
        $data2pas = strtotime($data2);        
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
          echo $data1pas."<br>";
          echo $data2pas."<br>";
          var_dump($data2pas);
          $lista2 = $dao2->selectByMarca($cod, $data1, $data2); //$data1, $data2);
                 
          echo $data1."<br>";
          echo $data2; 
          echo gettype($data2)."<br>";
          echo var_dump($data2);
          foreach ($lista2 as $key){                   
               echo "<tr><td>nome_produto:</td><td>".$key->get('nome')."</td></tr>";
               echo "<tr><td>preco:</td><td>".$key->get('preco')."</td></tr>";
               echo "<tr><td>quantidade vendida</td><td>".$key->get('quant_vend')."</td></tr>";
               echo "<tr><td>arrecadação</td><td>".$key->get('arrecadacao')."</td></tr>"; 
               echo "<tr><td>data: </td><td>".$key->get('data')."</td></tr>";
             //  echo "<tr><td>data: </td><td>".gettype($key->get('data'))."</td></tr>";
          }
         }         
        ?>  
        </table>
    </body>
</html>