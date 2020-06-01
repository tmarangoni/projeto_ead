<?php
session_start();
require_once '../../models/Paciente.php';
require_once '../../helpers/Valida.php';

$usuario = new Paciente();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Caso tenha campos não preenchidos no formulario
if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Preencha todos os campos por gentileza');
    return;
}
//verifica se o usuario existe no banco de dados
$resultado=$usuario->find($data['cpf']);
if($resultado != NULL){
    //verifica se existe usuario com as credenciais
    if (password_verify( $data['senha'], $resultado->senha)) {
        echo('<br/>');
        echo('logado com sucesso');
        //defino a sessao do usuario
        $_SESSION['acesso'] = 'paciente';
        $_SESSION['usuario'] = $resultado->id_paciente ;
        $_SESSION['tipo'] = $resultado->tipo_user ;
        $_SESSION['nome'] = $resultado->nome_paciente ;
        $_SESSION['img'] = $resultado->img;

        if ($_SESSION['tipo'] == 3) {
            echo "<script type='text/javascript'>window.top.location='../administrador/agendamento'</script>";
        }
        else{
            echo "<script type='text/javascript'>window.top.location='agendamento'</script>";
        }

    }
    else{
        echo('<br/>');
        echo('Dados incorretos, tente novamente.');
    }
}
else{
    echo('<br/>');
    echo('Usuario não existe');
}