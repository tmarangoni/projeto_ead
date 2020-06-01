<?php
require_once '../../models/Paciente.php';
session_start();
$usuario = new Paciente();
$id = $_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$usuario->setImgprof($data['imgprof']);
$usuario->setNome($data['nome']);
$usuario->setNascimento($data['nascimento']);
$usuario->setRg($data['rg']);
$usuario->setCpf($data['cpf']);
$usuario->setLogradouro($data['logradouro']);
$usuario->setComplemento($data['complemento']);
$usuario->setNumero($data['numero']);
$usuario->setBairro($data['bairro']);
$usuario->setEstado($data['estado']);
$usuario->setCidade($data['cidade']);
$usuario->setCep($data['cep']);
$usuario->setEmail($data['email']);
$usuario->setTelefone($data['telefone']);
$usuario->setId($id);


    // Realiza o update do usuario
    if ($usuario->update($id) and $usuario->updUser($id)) {
        echo("<script>alert('Atualizado com sucesso');</script>");
        echo("<script>  window.location = \"../../view/paciente/perfil\"</script>");
    } else {
        echo('Erro na Atualização');
    }



