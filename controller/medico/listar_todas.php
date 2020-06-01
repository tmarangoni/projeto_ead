<?php
require_once '../../models/Consulta.php';

session_start();
$usuario = new Consulta();
$medico = $_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setIdMedico($medico);


foreach($usuario->findConsultaMedico() as $key => $value)
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