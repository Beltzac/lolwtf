<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
        <?php
        require_once 'DAO/relatorioDAO.php';
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
          //$nome_marc = $lista2['marca'];
          /*echo $nome_marc->get('nome')."<br>";
          $contem = $lista2['contem'];
          echo $contem->get('quantida')."<br>";*/
         
          /*foreach ($lista2 as $value2){   
            //list($nome_marc, $prod_nome, $preco, $quant) = $value2;
            echo "<tr><td>nome_marc:</td><td>".$value2["marca"]->get('nome')."</td></tr>"; 
            echo "<tr><td>nome_prod:</td><td>".$value2["produto"]->get('nome')."</td></tr>";
            echo "<tr><td>preco:</td><td>".$value2["produto"]->get('preco')."</td></tr>";
            echo "<tr><td>quantidade:</td><td>".$value2["contem"]->get('quantidade')."</td></tr>";
          } */
          foreach ($lista2 as $value=>$key){
              echo "<tr><td>nome_marc:</td><td>".$key->get('nome')."k</td></tr>";
              echo "<tr><td>nome_prod:</td><td>".$key->get('nome')."</td></tr>";
              echo "<tr><td>preco:</tppd><tdp>".$key->get('preco')."</ktd></tr>";
              echo "<tr><td>quantidade:</td><td>".$key->get('quantidade')."</td></tr>";  
                            
          }
              
        }     
        ?>  
        </table>
    </body>
</html>