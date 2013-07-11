<?php

require_once 'PessoaDAO.php';
require_once 'enderecoDAO.php';

function redirect() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: index.php');
    }
}

$edao = new EnderecoDAO();
$pdao = new PessoaDAO();
switch ($_POST['acao']) {
    case 'novaConta':

        $e = new Endereco;

        $e->set('rua', $_POST['campoRua']);
        $e->set('cep', $_POST['campoCep']);
        $e->set('cidade', $_POST['campoCidade']);
        $e->set('estado', $_POST['campoEstado']);
        $e->set('num', $_POST['campoNumero']);
        $e->set('complemento', $_POST['campoComplemento']);

        $err = $edao->insert($e);


        if (!$err) {


            $last = $edao->lastID();


            $p = new Pessoa();

            $p->set('nome', $_POST['campoNome']);
            $p->set('telefone', $_POST['campoTelefone']);
            $p->set('senha', $_POST['campoSenha']);
            $p->set('email', $_POST['campoEmail']);
            $p->set('rg', $_POST['campoRg']);
            $p->set('cpf', $_POST['campoCpf']);
            $p->set('nivel_d_aces', 0);
            $p->set('cod_end', $last);
            $p->set('nascimento', $_POST['campoNascimento']);


            $pdao->insert($p);
        }

        

        break;

    case 'Atualizar':

        $e = new Endereco;

        $e->set('rua', $_POST['rua']);
        $e->set('cep', $_POST['cep']);
        $e->set('cidade', $_POST['cidade']);
        $e->set('estado', $_POST['estado']);
        $e->set('num', $_POST['num']);
        $e->set('complemento', $_POST['complemento']);
        $e->set('cod_end', $_POST['cod_end']);

        $edao->update($e);

        $p = new Pessoa();

        $p->set('nome', $_POST['nome']);
        $p->set('telefone', $_POST['telefone']);
        $p->set('senha', $_POST['senha']);
        $p->set('email', $_POST['email']);
        $p->set('rg', $_POST['rg']);
        $p->set('cpf', $_POST['cpf']);
        $p->set('nivel_d_aces', $_POST['nivel_d_aces']);
        $p->set('nascimento', $_POST['nascimento']);
        $p->set('cod_end', $_POST['cod_end']);


        $pdao->update($p);

        break;

    case 'Deletar':

        $pdao->Delete($_POST['id']);
        $edao->Delete($_POST['cod_end']);

        break;

    default:
        break;
}

redirect();
?>
