<?php
require_once '../../models/Consulta.php';
require_once '../../helpers/Valida.php';

session_start();
$usuario = new Consulta();
$valida = new Valida();
$medico =$_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setData($data['data']);
$usuario->setIdMedico($medico);

if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Escolha uma opção por favor.');
    return;
}
if($usuario->findConsulta() == NULL){
    echo('Não existe consultas para essa data');
    return;
}

foreach($usuario->findConsulta() as $key => $value)
{

    echo("<br/>");
    echo("<table>");
    echo("<tr> Data: ");
    echo date('d-m-Y', strtotime($value->data_consulta));
    echo("<br/>");
    echo("<tr> Horário: ".$value->horario_consulta." <br/>");
    echo("<tr> Paciente: ".$value->nome_paciente." ");
    echo("<td>Observacoes: ".$value->observacoes."</td></tr>");
    echo("</table>");
}