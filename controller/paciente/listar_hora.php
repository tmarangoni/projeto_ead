<?php
require_once '../../models/Consulta.php';
require_once '../../helpers/Valida.php';


$id = $_GET['data'];

session_start();
$usuario = new Consulta();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setData($data['data']);

if($usuario->findData($id) == NULL){
    echo('Não existe datas disponíveis para este médico');
    return;
}

foreach($usuario->findData($id) as $key => $value)
{

    echo("<option id='".$value->horario."'>".$value->horario."</option>");

}