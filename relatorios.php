<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        require_once 'DAO/relatorioDAO.php';
        //require_once 'funcoes.php';
        $opcao = $_POST['op'];
        if($opcao == "op1"){
         $dao = new relatorioDAO();
         $lista = $dao->selectByCiente();
         foreach ($lista as $value){
            echo $value->get('nome');  
            echo $value->get('rg'); 
            echo $value->get('cpf'); 
            echo $value->get('id'); 
         }
        }
         if($opcao == "op2"){
          $dao2 = new relatorioDAO();
          $lista2 = $dao2->selectByMarca();
          foreach ($lista2 as $value2){
            echo $value2->get('nome'); 
            echo $value2->get('codmarc');
          }
        }     
        ?>      
    </body>
</html>