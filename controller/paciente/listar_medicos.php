<?php
require_once '../../models/Medico.php';
require_once '../../helpers/Valida.php';

$usuario = new Medico();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//Caso tenha campos não preenchidos no formulario
if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Escolha uma opção por favor.');
    return;
}

if($usuario->findMedicos($data['categoria']) == NULL){
    echo("<br/>");
    echo('Não há médico disponível para esta especialidade');
    return;
}

foreach($usuario->findMedicos($data['categoria']) as $key => $value)
{
     echo("<div style='float:left'>");
     echo("<br/>");
     echo("<table>");
     echo("<th ><button class='box-med btn btn-primary'  name='".$value->id_medico."' id='".$value->id_medico."' onclick='showConsultaCategoria(name)'  value='' >
                Dr(a): ".$value->nome_medico."<br/>
                CRM: ".$value->crm."
                </button></th>");
     echo("</table>");
     echo("</div>");

}