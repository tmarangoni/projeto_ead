<?php
require_once '../../models/Consulta.php';

session_start();
$usuario = new Consulta();
$paciente =$_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setIdPaciente($paciente);


foreach($usuario->findAll() as $key => $value)
{

    echo("<br/>");
    echo("<table>");
    echo("<tr> Data: ");
    echo date('d-m-Y', strtotime($value->data_consulta));
    echo("<br/>");
    echo("<tr> Horário: ".$value->horario_consulta." <br/>");
    echo("<tr> Dr(a): ".$value->nome_medico." - ".$value->categoria." ");
    echo("<td>Observacoes: ".$value->observacoes."</td></tr>");
    echo("</table>");

}