<?php
require_once '../../models/Consulta.php';
session_start();
$usuario = new Consulta();
$paciente = $_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$usuario->setData($data['data']);
$usuario->setIdMedico($data['medico']);
$usuario->setIdPaciente($paciente);
$usuario->setHorario($data['horario']);
$usuario->setObservacao($data['observacoes']);

$resultado =$usuario->findConsulta();
if($resultado != NULL){

echo ("<script>alert('Ja existe consulta marcada para esse dia com esse médico, verifique outros médicos da área ou tente outra data.');window.top.location='../../view/paciente/agendamento';</script>");
    return;
}


// Realiza a inserção da consulta
if($usuario->insert()){
    echo("<script>alert('Agendamento realizado com sucesso ');window.top.location='../../view/paciente/agendamento';</script>");
    return;
}
else{
    echo("<script>alert('Erro no cadastro');window.top.location='../../view/paciente/agendamento';</script>");
    return;
}

