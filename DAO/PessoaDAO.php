<?php

require_once 'connection.php';
require_once 'Pessoa.php';
require_once 'DAO.php';

class PessoaDAO extends DAO  { 

    function insert( Pessoa $pessoa) {


        $stmt = $this->con->stmt_init();

        $stmt->prepare("INSERT INTO pessoa (nome, telefone, senha, email, rg, cpf, nivel_d_aces, cod_end, nascimento) VALUES (?,?,?,?,?,?,?,?,?)");
        if ($stmt) {


            $stmt->bind_param("sssssssss",$pessoa->get('nome'),$pessoa->get('telefone'),$pessoa->get('senha'),$pessoa->get('email'),$pessoa->get('rg'),$pessoa->get('cpf'),$pessoa->get('nivel_d_aces'),$pessoa->get('cod_end'),$pessoa->get('nascimento'));

            $stmt->execute();
            $err = $stmt->errno;
            $stmt->close();

            return $err;
        }
    }

    function  selectAll() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM pessoa");

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
    
    
    function  selectByCod($cod) {
       $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM pessoa where id = ?");
        $stmt->bind_param("i", $cod);

        $stmt->execute();

        $stmt->bind_result($nome, $telefone, $senha, $email, $rg, $cpf, $nivel_d_aces, $cod_end,$id,$nascimento);

    


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
          

        }


        $stmt->close();

        return $p;
    }

    
  function  selectByEmail($email) {
       $stmt = $this->con->stmt_init();
       
        $stmt->prepare("SELECT * FROM pessoa where email = ?");
        $stmt->bind_param("s",$email);

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

 function Delete($cod) {


        $stmt = $this->con->stmt_init();

        $stmt->prepare("DELETE FROM pessoa where id = ?");
        
        
        if ($stmt) {


           $stmt->bind_param("i", $cod);

            $stmt->execute();
            $err = $stmt->errno;
            $stmt->close();           
        }
         return $err;
    }
    
    function update( Pessoa $pessoa) {


        $stmt = $this->con->stmt_init();

        $stmt->prepare("update pessoa set nome = ?, telefone = ?, senha = ?, email = ?, rg = ?, cpf = ?, nivel_d_aces = ?, cod_end = ?, nascimento = ? where id = ?");
        if ($stmt) {


            $stmt->bind_param("ssssssssss",$pessoa->get('nome'),$pessoa->get('telefone'),$pessoa->get('senha'),$pessoa->get('email'),$pessoa->get('rg'),$pessoa->get('cpf'),$pessoa->get('nivel_d_aces'),$pessoa->get('cod_end'),$pessoa->get('nascimento'),$pessoa->get('id'));

            $stmt->execute();
            echo $stmt->error;
            $err = $stmt->errno;
            $stmt->close();

            return $err;
        }
    }
    
}