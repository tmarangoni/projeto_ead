<?php
require_once '../../models/Paciente.php';
require_once '../../helpers/Valida.php';

    $usuario = new Paciente();
    $valida = new Valida();
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Caso ja exista outro usuario cadastrado com mesmo email
    if($usuario->find($data['cpf']) != NULL){
     echo("<br/>");
     echo('Por favor, esse CPF ja esta cadastrado no sistema. Tente novamente.');
    return;
    }
//Caso usuario tenha email invalido
    if($valida->Email($data['email']) == false){
     echo("<br/>");
     echo('E-mail invalido');
    return;
    }
//Caso tenha campos não preenchidos no formulario
    if($valida->Campos($data) == true) {
     echo("<br/>");
     echo('Preencha todos os campos por gentileza');
    return;
    }
//Caso senhas inseridas sejam diferentes
    if($valida->Senha($data['senha'],$data['senhaRepetida']) == true) {
     echo("<br/>");
     echo('As senhas devem ser iguais!');
    return;
    }
    //aplica criptografia
    $senha = password_hash($data['senha'], PASSWORD_DEFAULT);
    $usuario->setNome($data['nome']);
    $usuario->setEmail($data['email']);
    $usuario->setSenha($senha);
    $usuario->setCpf($data['cpf']);

// Realiza a inserção do usuario
  if($usuario->insert()){
        echo "Cadastrado com sucesso!";
    }
  else{
        echo('Erro no Cadastro');
  }

