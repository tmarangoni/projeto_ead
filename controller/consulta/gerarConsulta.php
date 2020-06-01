<!DOCTYPE html>
<?php
$id = $_GET['id'];
    echo("<form method='post' action='../../controller/consulta/consulta.php' name='marcar_consulta'>");
    echo('<label>2. Selecionar a data:  </label>');
    echo("<input id='data' name='data' type='date' value='' class=\"form-control bg-light small\" onchange='showConsultaHora(value)' required='required'/>");
    echo('<label>3. Selecionar o horário:  </label>');
    echo("        <select id='horario' name='horario' class=\"form-control bg-light \" value='' >
            <option value=\"\">Escolha uma opção</option>
                        
            </select>");
    echo('<br/>');
    echo('<br/>');
    echo("<textarea name='observacoes' placeholder=\"Observações\" class='form-control bg-light'></textarea>");
    echo('<br/>');
    echo('<br/>');
    echo("<input hidden name='medico' value='".$id."'/>");
    echo("<input class='btn btn-primary' value='Criar Agendamento' type='submit'/>");
    echo("</form>");


    ?>

